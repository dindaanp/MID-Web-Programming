<?php

namespace App\Http\Controllers;

use App\Models\Wishlist; // Pastikan model Wishlist diimpor
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        // Ambil wishlist untuk pengguna yang sedang login
        $wishlist = Wishlist::where('anggota_id', auth()->id())->get();
        
        return view('wishlist.index', compact('wishlist'));
    }
}