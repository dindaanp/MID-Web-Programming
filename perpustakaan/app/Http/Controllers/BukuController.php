<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required'
        ]);

        Buku::create($request->all());
        return redirect()->route('buku.index');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'kategori_id' => 'required'
        ]);

        Buku::find($id)->update($request->all());
        return redirect()->route('buku.index');
    }

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('buku.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $buku = Buku::where('judul', 'LIKE', '%' . $query . '%')->get();
        return view('buku.search', compact('buku')); // Pastikan view 'buku.search' ada
    }

    public function return()
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->whereNull('tanggal_kembali')->get();
        return view('buku.return', compact('peminjaman'));
    }

    public function submitReturn(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|integer|exists:buku,id',
            'anggota_id' => 'required|integer|exists:anggota,id',
        ]);

        $peminjaman = Peminjaman::where('buku_id', $request->buku_id)
                                  ->where('anggota_id', $request->anggota_id)
                                  ->whereNull('tanggal_kembali')
                                  ->first();

        if ($peminjaman) {
            $peminjaman->tanggal_kembali = now();
            $peminjaman->save();
            return redirect()->route('buku.return')->with('success', 'Buku berhasil dikembalikan.');
        }

        return redirect()->route('buku.return')->with('error', 'Buku tidak ditemukan dalam peminjaman.');
    }

    public function popular()
    {
        $buku = Buku::with('kategori')
            ->orderBy('id', 'desc')
            ->take(10) // Mengambil 10 buku terpopuler
            ->get();
        return view('buku.popular', compact('buku')); // Pastikan view 'buku.popular' ada
    }

    public function reviews($id)
    {
        $buku = Buku::with('reviews.user')->find($id);

        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }

        // Kirim data buku dan ulasan ke view
        return view('reviews.index', compact('buku'));
    }

    public function addToWishlist($id)
    {
        $buku = Buku::findOrFail($id);
        Auth::user()->wishlist()->attach($buku);

        return redirect()->back()->with('success', 'Buku ditambahkan ke Wishlist!');
    }

    public function viewWishlist()
    {
        $wishlist = Auth::user()->wishlist()->get();
        return view('anggota.wishlist', compact('wishlist'));
    }
}
