<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi ke tabel yang sudah ada
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_nip', 'nip');
    }

    public function matpel()
    {
        return $this->belongsTo(Matpel::class, 'matpel_kode', 'kode');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke pertanyaan
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
