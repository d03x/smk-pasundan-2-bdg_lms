<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Matpel;
use App\Models\Kelas;
use App\Models\Pengajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Halaman List Quiz
    public function index()
    {
        $quizzes = Quiz::with(['matpel', 'kelas'])
            ->where('guru_nip', Auth::user()->guru->nip) // Asumsi user punya relasi ke guru
            ->latest()
            ->get();

        return inertia('guru/quiz/index', [
            'quizzes' => $quizzes
        ]);
    }

    public function create()
    {
        $guruNip = Auth::user()->guru->nip;

        // 1. Ambil semua data pengajaran guru ini beserta relasi kelas dan matpel
        $pengajaran = Pengajaran::with(['kelas', 'matpel'])
            ->where('guru_nip', $guruNip)
            ->get();

        // 2. Ambil list Kelas yang UNIK (agar tidak duplikat di dropdown)
        $kelasList = $pengajaran->pluck('kelas')->unique('id')->values();

        // 3. Mapping Matpel berdasarkan Kelas ID
        // Format output nanti: { '1': [Matpel A, Matpel B], '2': [Matpel C] }
        $matpelsByKelas = $pengajaran->groupBy('kelas_id')->map(function ($items) {
            return $items->pluck('matpel')->unique('kode')->values();
        });

        return inertia('guru/quiz/Form', [
            'kelas_list' => $kelasList,         // Untuk dropdown pertama
            'matpel_map' => $matpelsByKelas,    // Untuk dropdown kedua (reaktif)
        ]);
    }

    public function store(Request $request)
    {
        // ... validasi dasar ...

        // TAMBAHAN: Validasi Logic (Pastikan Guru BENAR-BENAR mengajar matpel di kelas tsb)
        $isValidPengajaran = Pengajaran::where('guru_nip', Auth::user()->guru->nip)
            ->where('kelas_id', $request->kelas_id)
            ->where('matpel_kode', $request->matpel_kode)
            ->exists();

        if (!$isValidPengajaran) {
            return back()->withErrors(['error' => 'Anda tidak mengajar mata pelajaran ini di kelas tersebut.']);
        }

        // ... Lanjutkan logic try-catch DB Transaction seperti kode Anda ...
        try {
            DB::beginTransaction();

            // Simpan Quiz (sama seperti kode Anda sebelumnya)
            $quiz = Quiz::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'guru_nip' => Auth::user()->guru->nip,
                'matpel_kode' => $request->matpel_kode,
                'kelas_id' => $request->kelas_id,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_selesai' => $request->waktu_selesai,
                'durasi_menit' => $request->durasi_menit,
                'status' => 'published',
            ]);

            // ... Looping questions & options (sama seperti kode Anda) ...

            DB::commit();
            return to_route('guru.quiz.index')->with('success', 'Quiz berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal: ' . $e->getMessage()]);
        }
    }
}
