<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_name', 'class', 'status', 'report_date', 'category', 'description', 'teacher_notes', 'user_id',
    ];

    // Relasi dengan User (guru)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Cast tanggal agar tampil dengan format yang benar
    protected $casts = [
        'report_date' => 'date',
    ];
}

