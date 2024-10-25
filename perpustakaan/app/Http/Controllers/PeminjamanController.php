<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota; // Pastikan model Anggota diimpor
use App\Models\Peminjaman; // Impor model Peminjaman
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function create()
    {
        $buku = Buku::all(); // Ambil semua buku
        $anggota = Anggota::all(); // Ambil semua anggota
        return view('pinjam.create', compact('buku', 'anggota')); // Tampilkan form peminjaman
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'anggota_id' => 'required|exists:anggota,id',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Simpan data peminjaman
        Peminjaman::create([
            'buku_id' => $request->buku_id,
            'anggota_id' => $request->anggota_id,
        ]);

        return redirect()->route('home')->with('success', 'Buku berhasil dipinjam!');
    }

    public function history()
    {
        // Ambil riwayat peminjaman untuk pengguna yang sedang login
        $riwayatPeminjaman = Peminjaman::where('anggota_id', auth()->id())->get();
        
        // Kembalikan tampilan dengan data riwayat peminjaman
        return view('peminjaman.history', compact('riwayatPeminjaman'));
    }
}