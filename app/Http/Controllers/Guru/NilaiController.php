<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function simpan(Request $request)
    {
        $validated = $request->validate([
            'tugas_id'   => 'required|exists:tugas,tugasID',
            'siswa_id'   => 'required|exists:users,id',
            'jawaban_id' => 'nullable|exists:jawaban_tugas,jawabanID', // Opsional, bisa null jika siswa belum mengumpulkan tapi guru mau nilai manual
            'nilai'      => 'required|numeric|min:0|max:100',
            'komentar'   => 'nullable|string',
        ]);

        Nilai::updateOrCreate(
            [
                'tugas_id' => $validated['tugas_id'],
                'siswa_id' => $validated['siswa_id'],
            ],
            [
                'jawaban_id' => $validated['jawaban_id'] ?? null,
                'angka'      => $validated['nilai'], // Pastikan nama kolom di DB 'angka' atau sesuaikan jadi 'nilai'
                'komentar'   => $validated['komentar'] ?? null,
            ]
        );

        return back()->with('success', 'Nilai berhasil disimpan!');
    }
}
