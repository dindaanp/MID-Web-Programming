{{-- resources/views/anggota/index.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk background dengan gradien pink muda dan ungu muda */
    body {
        background: linear-gradient(135deg, #ff9fbc 0%, #d8b4fe 100%);
        background-size: cover;
        font-family: 'Arial', sans-serif;
        position: relative;
        overflow: hidden; /* agar bintang tidak melampaui batas */
    }

    /* menambahkan efek bintang */
    .star {
        position: absolute;
        background: white;
        border-radius: 50%;
        opacity: 0.8;
        animation: twinkle 1.5s infinite;
    }

    @keyframes twinkle {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
    }

    /* mengatur jumlah bintang */
    .star:nth-child(1) { top: 10%; left: 20%; width: 10px; height: 10px; }
    .star:nth-child(2) { top: 15%; left: 40%; width: 8px; height: 8px; }
    .star:nth-child(3) { top: 5%; left: 60%; width: 12px; height: 12px; }
    .star:nth-child(4) { top: 25%; left: 80%; width: 9px; height: 9px; }
    .star:nth-child(5) { top: 30%; left: 30%; width: 11px; height: 11px; }
    .star:nth-child(6) { top: 20%; left: 70%; width: 10px; height: 10px; }
    .star:nth-child(7) { top: 40%; left: 10%; width: 8px; height: 8px; }
    .star:nth-child(8) { top: 50%; left: 90%; width: 12px; height: 12px; }
    .star:nth-child(9) { top: 60%; left: 50%; width: 9px; height: 9px; }
    .star:nth-child(10) { top: 70%; left: 30%; width: 11px; height: 11px; }

    /* pengaturan judul */
    h1 {
        text-align: center;
        color: #ffffff; /* warna putih untuk kontras */
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* desain link tombol */
    a {
        text-decoration: none;
        color: #ffffff; /* warna putih untuk teks link */
        background-color: #d8b4fe; /* warna pastel ungu untuk tombol */
        padding: 10px 15px;
        border-radius: 10px;
        transition: background-color 0.3s ease; /* transisi halus saat hover */
    }

    /* efek hover pada tombol */
    a:hover {
        background-color: #91a7ff; /* warna pastel biru saat hover */
    }

    /* desain tabel yang lebih menarik dengan elemen pastel */
    table {
        width: 100%;
        border-collapse: collapse; /* menghilangkan jarak antar border */
        margin-top: 20px;
        background-color: white; /* latar belakang putih pada tabel */
        border-radius: 15px; /* sudut melengkung */
        overflow: hidden;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* bayangan lembut di bawah tabel */
    }

    /* desain header dan konten tabel */
    th, td {
        padding: 12px 15px; /* spasi dalam setiap sel */
        text-align: center; /* teks di tengah */
        border-bottom: 1px solid #f2f2f2; /* garis pemisah antar sel */
    }

    /* pengaturan warna header tabel */
    th {
        background-color: #91a7ff; /* warna pastel biru pada header */
        color: white; /* teks putih untuk kontras */
    }

    /* warna pada sel data tabel */
    td {
        background-color: #ffebf2; /* warna pastel pink muda untuk sel tabel */
    }

    /* desain tombol untuk aksi (Edit, Hapus) */
    button {
        background-color: #d8b4fe; /* warna pastel ungu */
        color: white; /* teks putih */
        border: none; /* menghilangkan border default */
        padding: 8px 12px;
        border-radius: 5px; /* sudut melengkung pada tombol */
        cursor: pointer; /* mengubah kursor menjadi pointer */
        transition: background-color 0.3s ease; /* transisi saat hover */
    }

    /* efek hover pada tombol */
    button:hover {
        background-color: #91a7ff; /* warna pastel biru saat tombol di-hover */
    }

    /* gaya untuk tulisan "Laravel" di navbar */
    .navbar-brand {
        color: #d8b4fe !important; /* warna pastel ungu untuk teks */
        font-size: 24px; /* ukuran font lebih besar */
        font-weight: bold; /* teks tebal */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* efek bayangan untuk teks */
    }

</style>

<h1>Daftar Anggota</h1>
<div style="text-align: center; margin-bottom: 20px;">
    <a href="{{ route('anggota.create') }}">Tambah Anggota</a>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($anggota as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->telepon }}</td>
            <td>
                <a href="{{ route('anggota.edit', $item->id) }}">Edit</a>
                <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- menambahkan bintang ke halaman --}}
@for ($i = 0; $i < 10; $i++)
    <div class="star"></div>
@endfor

@endsection