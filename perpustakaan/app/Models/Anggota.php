<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $fillable = ['nama', 'alamat', 'telepon'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function wishlist()
    {
        return $this->belongsToMany(Buku::class, 'wishlist');
    }
}