<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_name',
        'teacher_name', // Kolom baru
        'status',
        'report_date',
        'description',
        'scores', // Kolom baru
        'club', // Kolom baru
        'teacher_notes',
    ];

    // Relasi dengan child (nama anak)
    public function child()
{
    return $this->belongsTo(Children::class);
}

public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cast tanggal agar tampil dengan format yang benar
    protected $casts = [
        'report_date' => 'date',
    ];
}

