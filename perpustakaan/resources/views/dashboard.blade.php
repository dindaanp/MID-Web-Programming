{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')

<style>
    /* CSS background */
    body {
        background: linear-gradient(135deg, #ffffff 0%, #ff99c8 100%);
        background-size: cover;
        font-family: 'Arial', sans-serif;
        position: relative;
        overflow: hidden; /* agar elemen tidak melampaui batas */
    }

    /* gaya untuk judul */
    h1 {
        text-align: center;
        color: #4B0082; /* warna ungu tua untuk kontras */
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* bayangan untuk memperjelas teks */
    }

    /* gaya untuk daftar menu */
    ul {
        list-style-type: none; /* menghilangkan bullet */
        padding: 0;
        text-align: center; /* rata tengah */
    }

    /* gaya untuk link menu */
    li {
        margin: 15px 0; /* jarak antar item menu */
        text-align: left; /* rata kiri */
    }

    a {
        text-decoration: none;
        color: #ffffff; /* warna putih untuk teks link */
        background-color: #d8b4fe; /* warna pastel ungu untuk tombol */
        padding: 10px 20px;
        border-radius: 10px;
        transition: background-color 0.3s ease; /* transisi halus saat hover */
    }

    /* efek hover pada link */
    a:hover {
        background-color: #ff99c8; /* warna pastel pink saat hover */
    }

    /* tombol cari */
    button {
        background-color: #d8b4fe; /* warna pastel ungu */
        color: white; /* teks putih */
        border: none; /* menghilangkan border default */
        padding: 8px 15px;
        border-radius: 5px; /* sudut melengkung pada tombol */
        cursor: pointer; /* mengubah kursor menjadi pointer */
        transition: background-color 0.3s ease; /* transisi saat hover */
    }

    /* efek hover pada tombol cari */
    button:hover {
        background-color: #ff99c8; /* warna pastel pink saat tombol di-hover */
    }

    /* gaya untuk tulisan "Laravel" di navbar */
    .navbar-brand {
        color: #4B0082 !important; /* warna pastel ungu untuk teks */
        font-size: 24px; /* ukuran font lebih besar */
        font-weight: bold; /* teks tebal */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* efek bayangan untuk teks */
    }
</style>

    <div class="container">
        <h1>Sistem Manajemen Perpustakaan</h1>
        <ul>
            <li>
                <form action="{{ route('search.books') }}" method="GET" style="display: inline;">
                    <input type="text" name="query" placeholder="Cari buku..." required>
                    <button type="submit">Cari</button>
                </form>
            </li>
            <li><a href="{{ route('borrow.books') }}">Pinjam Buku</a></li>
            <li><a href="{{ route('return.books') }}">Kembalikan Buku</a></li>
            <li><a href="{{ route('manage.categories') }}">Manajemen Kategori Buku</a></li>
            <li><a href="{{ route('popular.books') }}">Daftar Buku Populer</a></li>
            <li><a href="{{ route('book.reviews') }}">Ulasan Buku</a></li>
            <li><a href="{{ route('peminjaman.history') }}">Riwayat Peminjaman</a></li>
            <li><a href="{{ route('wishlist.books') }}">Wishlist Buku</a></li>
            <li>
                <!-- Form Logout (Menggunakan POST Method) -->
                @auth
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
                </form>
                @endauth
            </li>
        </ul>
    </div>
@endsection
