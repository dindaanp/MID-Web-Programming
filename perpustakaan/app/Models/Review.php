<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'buku_id',
        'user_id',
        'content',
    ];

    // Relasi dengan model Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}