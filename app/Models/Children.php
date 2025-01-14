<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'NISN',
        'class',
        'gender',
        'birth',
        'parent',
        'address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
