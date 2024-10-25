<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = ['judul', 'pengarang', 'penerbit', 'tahun_terbit', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Definisikan relasi dengan Review tanpa parameter
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function wishlist()
    {
        return $this->belongsToMany(Anggota::class, 'wishlist');
    }
}
