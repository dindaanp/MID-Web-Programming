@extends('layouts.app')

@section('content')
<style>
    /* Gaya untuk latar belakang penuh warna */
    body {
        background-color: #ffebee; /* Warna latar belakang pink pastel */
        font-family: 'Arial', sans-serif;
        color: #4B0082; /* Warna font ungu tua */
        overflow: hidden; /* Menghindari scrollbar */
    }

    /* Gaya untuk judul */
    h1 {
        font-size: 28px; /* Ukuran font untuk judul */
        text-align: center; /* Rata tengah */
        margin-bottom: 20px; /* Jarak di bawah judul */
        color: #d5006d; /* Warna judul ungu muda */
    }

    /* Gaya untuk tabel */
    table {
        width: 90%; /* Lebar tabel */
        margin: 0 auto; /* Rata tengah */
        border-collapse: collapse; /* Menghilangkan jarak antar border */
        background-color: #ffffff; /* Warna latar belakang tabel putih */
        border-radius: 10px; /* Sudut melengkung */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan tabel */
    }

    /* Gaya untuk header tabel */
    thead {
        background-color: #d1c4e9; /* Warna latar belakang header ungu muda */
        color: #4B0082; /* Warna font ungu tua */
    }

    /* Gaya untuk sel tabel */
    th, td {
        padding: 12px; /* Jarak dalam sel */
        text-align: center; /* Rata tengah */
        border-bottom: 1px solid #f1f1f1; /* Garis bawah sel */
    }

    /* Gaya untuk hover pada baris tabel */
    tr:hover {
        background-color: #f8bbd0; /* Warna saat hover pink muda */
        transition: background-color 0.3s; /* Transisi saat hover */
    }

    /* Gaya untuk tombol */
    .btn {
        background-color: #4B0082; /* Warna tombol ungu tua */
        color: white; /* Warna teks putih */
        border: none; /* Menghilangkan border default */
        padding: 8px 12px; /* Jarak dalam tombol */
        border-radius: 5px; /* Sudut melengkung */
        cursor: pointer; /* Ubah kursor menjadi pointer */
        transition: background-color 0.3s, transform 0.3s; /* Transisi saat hover */
    }

    /* Efek hover pada tombol */
    .btn:hover {
        background-color: #9370DB; /* Warna saat hover */
        transform: translateY(-2px); /* Mengangkat tombol saat hover */
    }

    /* Keyframes untuk animasi gelembung */
    @keyframes bubble-animation {
        0% {
            transform: translateY(0); /* Posisi awal dari bawah */
            opacity: 1; /* Opasitas penuh */
        }
        50% {
            transform: translateY(-50px); /* Naik */
            opacity: 0.5; /* Mengurangi opasitas */
        }
        100% {
            transform: translateY(0); /* Kembali ke posisi awal */
            opacity: 1; /* Opasitas penuh */
        }
    }

    /* gaya untuk tulisan "laravel" */
    .navbar-brand {
        color: #d8b4fe !important; /* Warna pastel ungu */
        font-size: 24px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Menambah efek shadow */
    }

    .bubble {
        position: absolute;
        bottom: 0; /* Memastikan gelembung mulai dari bawah */
        background-color: rgba(216, 180, 254, 0.7); /* Warna pastel ungu */
        border-radius: 50%;
        animation: moveBubble 10s infinite; /* Menambahkan animasi */
    }

    /* Gerakan gelembung */
    @keyframes moveBubble {
        0% {
            transform: translateY(0); /* Posisi awal dari bawah */
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh); /* Gerakan menuju atas */
            opacity: 0; /* Memudarkan opasitas */
        }
    }

    /* Menghasilkan banyak gelembung */
    .bubble:nth-child(1) { width: 20px; height: 20px; left: 10%; animation-duration: 8s; animation-delay: 0s; }
    .bubble:nth-child(2) { width: 30px; height: 30px; left: 20%; animation-duration: 10s; animation-delay: 2s; }
    .bubble:nth-child(3) { width: 40px; height: 40px; left: 30%; animation-duration: 12s; animation-delay: 4s; }
    .bubble:nth-child(4) { width: 25px; height: 25px; left: 40%; animation-duration: 9s; animation-delay: 1s; }
    .bubble:nth-child(5) { width: 35px; height: 35px; left: 50%; animation-duration: 11s; animation-delay: 3s; }
    .bubble:nth-child(6) { width: 45px; height: 45px; left: 60%; animation-duration: 13s; animation-delay: 5s; }
    .bubble:nth-child(7) { width: 20px; height: 20px; left: 70%; animation-duration: 8s; animation-delay: 0s; }
    .bubble:nth-child(8) { width: 30px; height: 30px; left: 80%; animation-duration: 10s; animation-delay: 2s; }
    .bubble:nth-child(9) { width: 40px; height: 40px; left: 90%; animation-duration: 12s; animation-delay: 4s; }
    .bubble:nth-child(10) { width: 25px; height: 25px; left: 15%; animation-duration: 9s; animation-delay: 1s; }
</style>

<h1>Buku Populer</h1> <!-- Judul halaman -->
<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Kategori</th>
            <th>Jumlah Pinjam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $item)
        <tr>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->pengarang }}</td>
            <td>{{ $item->kategori->nama }}</td>
            <td>{{ $item->jumlah_pinjam }}</td> <!-- Pastikan kolom ini ada di model Buku -->
            <td>
                <a href="{{ route('buku.reviews', $item->id) }}" class="btn btn-info btn-sm">Lihat Ulasan</a>
                <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Menambahkan elemen gelembung -->
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

@endsection
