<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilais', function (Blueprint $table) {
            // 1. Tambah kolom quiz_id (Nullable)
            // Cek Model Quiz Anda: Jika pakai UUID, ganti foreignId ke foreignUuid
            $table->foreignId('quiz_id')->nullable()->after('id')->constrained('quizzes')->onDelete('cascade');

            // 2. Ubah tugas_id agar BOLEH KOSONG (karena baris ini bisa jadi milik Quiz)
            $table->uuid('tugas_id')->nullable()->change();

            // 3. Ubah jawaban_id agar BOLEH KOSONG
            $table->uuid('jawaban_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {
            $table->dropForeign(['quiz_id']);
            $table->dropColumn('quiz_id');
        });
    }
};
