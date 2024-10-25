{{-- resources/views/kategori/create.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    /* Gaya untuk latar belakang penuh warna */
    body {
        background-color: #ffccff; /* Warna latar belakang pastel */
        font-family: 'Arial', sans-serif;
        color: #4B0082; /* Warna font ungu tua */
        position: relative; /* Untuk posisi ombak */
        overflow: hidden; /* Menghindari scrollbar */
    }

    /* Gaya untuk judul */
    h1 {
        font-size: 24px; /* Ukuran font lebih kecil */
        text-align: center; /* Rata tengah */
        margin-bottom: 20px; /* Jarak di bawah judul */
    }

    /* Gaya untuk form */
    form {
        display: flex; /* Menggunakan flexbox untuk tata letak */
        flex-direction: column; /* Kolom vertikal */
        align-items: center; /* Rata tengah */
    }

    /* Gaya untuk input teks */
    input[type="text"] {
        padding: 10px; /* Jarak dalam input */
        margin-bottom: 15px; /* Jarak di bawah input */
        border: 2px solid #4B0082; /* Border ungu tua */
        border-radius: 5px; /* Sudut melengkung */
        width: 500px; /* Lebar input */
    }

    /* Gaya untuk tombol simpan */
    button {
        background-color: #4B0082; /* Warna tombol ungu tua */
        color: white; /* Warna teks putih */
        border: none; /* Menghilangkan border default */
        padding: 10px 20px; /* Jarak dalam tombol */
        border-radius: 5px; /* Sudut melengkung */
        cursor: pointer; /* Ubah kursor menjadi pointer */
        transition: background-color 0.3s, transform 0.3s; /* Transisi saat hover */
        position: relative; /* Untuk animasi */
    }

    /* Efek hover pada tombol simpan */
    button:hover {
        background-color: #9370DB; /* Warna saat hover */
        transform: translateY(-5px); /* Mengangkat tombol saat hover */
    }

    /* Ilusi ombak di bagian bawah halaman */
    .wave {
        position: absolute;
        bottom: 0; /* Mengatur posisi di bawah */
        left: 0; /* Mengatur posisi ke kiri */
        width: 100%; /* Lebar ombak */
        height: 50px; /* Tinggi ombak */
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="1" d="M0,128L30,138.7C60,149,120,171,180,176C240,181,300,171,360,160C420,149,480,139,540,144C600,149,660,171,720,165.3C780,160,840,128,900,106.7C960,85,1020,75,1080,80C1140,85,1200,107,1260,117.3C1320,128,1380,128,1410,128L1440,128L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320H0Z"></path></svg>'); /* Ilusi ombak */
        background-size: cover; /* Ukuran penuh */
        opacity: 0.5; /* Transparansi ombak */
        animation: wave 5s infinite linear; /* Animasi ombak */
    }

    /* Animasi ombak */
    @keyframes wave {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    /* gaya untuk tulisan "laravel" */
    .navbar-brand {
        color: #d8b4fe !important; /* Warna pastel ungu */
        font-size: 24px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Menambah efek shadow */
    }
</style>

<h1>Tambah Kategori</h1> <!-- Judul halaman -->
<form action="{{ route('kategori.store') }}" method="POST"> <!-- Form untuk tambah kategori -->
    @csrf
    <input type="text" name="nama" placeholder="Nama Kategori" required> <!-- Input untuk nama kategori -->
    <button type="submit">Simpan</button> <!-- Tombol simpan -->
</form>

<div class="wave"></div> <!-- Ilusi ombak -->
@endsection
