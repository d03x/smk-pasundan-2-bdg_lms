<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function index()
    {
        $siswa = Auth::user()->siswa;

        // Ambil quiz berdasarkan kelas siswa
        $quizzes = Quiz::with(['matpel', 'guru'])
            ->where('kelas_id', $siswa->kelas_id)
            ->where('status', 'published')
            ->latest()
            ->get();

        return inertia('siswa/quiz/index', [
            'quizzes' => $quizzes
        ]);
    }

    public function show(Quiz $quiz)
    {
        $siswa = Auth::user()->siswa;

        // 1. Validasi Kelas
        if ($quiz->kelas_id !== $siswa->kelas_id) {
            return to_route('quiz.index')->withErrors(['error' => 'Akses ditolak.']);
        }

        // 2. Validasi Waktu
        $now = Carbon::now();
        if ($now < $quiz->waktu_mulai) {
            return to_route('quiz.index')->withErrors(['error' => 'Ujian belum dimulai.']);
        }
        if ($now > $quiz->waktu_selesai) {
            return to_route('quiz.index')->withErrors(['error' => 'Waktu ujian sudah habis.']);
        }

        // 3. Cek Apakah Sudah Mengerjakan
        // (SESUAI MODEL: Pakai 'siswa_id' dan 'quiz_id')
        $sudahMengerjakan = Nilai::where('siswa_id', $siswa->id)
            ->where('quiz_id', $quiz->id)
            ->exists();

        if ($sudahMengerjakan) {
            return to_route('quiz.index')->withErrors(['error' => 'Anda sudah mengerjakan ujian ini.']);
        }

        // 4. Load Soal & Opsi (Sembunyikan Kunci Jawaban)
        $quiz->load(['questions.options']);
        $quiz->questions->each(function ($question) {
            $question->options->makeHidden(['is_correct', 'created_at', 'updated_at']);
        });
        return inertia('siswa/quiz/Show', [
            'quiz' => $quiz
        ]);
    }

    public function store(Request $request, Quiz $quiz)
    {
        // Ambil data siswa dari relasi User (UUID)
        $siswa = Auth::user()->siswa;

        $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:quiz_questions,id',
            'answers.*.option_id' => 'required|exists:quiz_options,id',
        ]);

        try {
            DB::beginTransaction();

            // Cek Double Submit (Pakai siswa_id)
            $cekLagi = Nilai::where('siswa_id', $siswa->id)
                ->where('quiz_id', $quiz->id)
                ->exists();

            if ($cekLagi) {
                return to_route('quiz.index')->withErrors(['error' => 'Data sudah ada.']);
            }

            $totalSkor = 0;

            // Hitung Nilai
            $questions = $quiz->questions()->with('options')->get();

            foreach ($questions as $question) {
                $userAnswer = collect($request->answers)->firstWhere('question_id', $question->id);
                $optionIdDipilih = $userAnswer['option_id'] ?? null;

                $correctOption = $question->options->where('is_correct', 1)->first();

                if ($correctOption && $optionIdDipilih == $correctOption->id) {
                    $totalSkor += $question->bobot_nilai;
                }
            }

            // SIMPAN KE MODEL NILAI (SESUAI STRUKTUR ANDA)
            Nilai::create([
                'quiz_id' => $quiz->id,      // ID Quiz
                'siswa_id' => $siswa->id,    // UUID Siswa (bukan NIS lagi)
                'angka' => $totalSkor,       // Pakai field 'angka' (bukan total_nilai)
                // 'tugas_id' dibiarkan null karena ini quiz
                // 'jawaban_id' null
                // 'komentar' null
            ]);

            DB::commit();

            return to_route('quiz.index')->with('success', 'Ujian selesai! Nilai Anda: ' . $totalSkor);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal: ' . $e->getMessage()]);
        }
    }
}
