<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Menampilkan ulasan untuk buku tertentu
    public function index($buku_id)
    {
        $buku = Buku::findOrFail($buku_id);
        $reviews = $buku->reviews()->with('user')->get();
        return view('reviews.index', compact('buku', 'reviews'));
    }

    public function store(Request $request, $bukuId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $buku = Buku::find($bukuId);

        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }

        // Simpan ulasan baru
        Review::create([
            'buku_id' => $buku->id,
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('buku.reviews', $buku->id)->with('success', 'Ulasan berhasil ditambahkan');
    }
}