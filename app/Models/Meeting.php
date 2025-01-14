<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'meeting_date',
        'meeting_time',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
