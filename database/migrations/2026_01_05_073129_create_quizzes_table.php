<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabel Header Kuis
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();

            // Relasi ke Guru (NIP string), Matpel (Kode string), dan Kelas
            $table->string('guru_nip');
            $table->string('matpel_kode');
            $table->unsignedBigInteger('kelas_id');

            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai'); // Deadline
            $table->integer('durasi_menit'); // Durasi pengerjaan
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');

            $table->timestamps();

            // Foreign Keys
            $table->foreign('guru_nip')->references('nip')->on('gurus')->onDelete('cascade');
            $table->foreign('matpel_kode')->references('kode')->on('matpels')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });

        // 2. Tabel Pertanyaan
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->text('pertanyaan');
            $table->string('gambar')->nullable(); // Jika ada soal bergambar
            $table->integer('bobot_nilai')->default(1); // Point per soal
            $table->timestamps();
        });

        // 3. Tabel Opsi Jawaban (A, B, C, D)
        Schema::create('quiz_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_question_id')->constrained('quiz_questions')->onDelete('cascade');
            $table->text('teks_opsi');
            $table->boolean('is_correct')->default(false); // Penanda jawaban benar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_options');
        Schema::dropIfExists('quiz_questions');
        Schema::dropIfExists('quizzes');
    }
};
