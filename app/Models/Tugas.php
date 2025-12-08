<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $primaryKey = 'tugasID';
    protected $fillable = [
        'matpel_kode',
        'title',
        'receiver_type',
        'receiver_type_id',
        'content',
        'created_by_user_id',
        'mode_pengumpulan',
        'deadline',
        'publish_date',
    ];
    /** @use HasFactory<\Database\Factories\TugasFactory> */
    use HasFactory, HasUuids;

    public function casts()
    {
        return [
            'receiver_type_id' => "array"
        ];
    }
}
