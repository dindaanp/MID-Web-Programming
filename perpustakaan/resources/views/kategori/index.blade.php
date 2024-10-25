{{-- resources/views/kategori/index.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    /* Warna background yang lembut dan pastel */
    body {
        background: linear-gradient(135deg, #ffebf2 0%, #d8b4fe 100%); /* Gradasi warna pastel */
        font-family: 'Comic Sans MS', sans-serif; /* Font yang ceria */
        color: #4B0082; /* Warna ungu tua untuk teks */
        overflow: hidden; /* Menghilangkan scroll bar */
    }

    /* Gaya container */
    .container {
        max-width: 1100px; /* Lebar maksimum container */
        font-family: 'Arial', sans-serif;
        margin: 10px auto; /* Margin atas dan bawah */
        padding: 10px; /* Padding dalam container */
        background-color: white; /* Warna latar belakang container */
        border-radius: 20px; /* Sudut yang membulat */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        text-align: center; /* Rata tengah untuk teks */
    }

    /* Gaya untuk judul dengan efek hologram */
    .hologram-text {
        font-size: 32px; /* Ukuran font untuk judul */
        font-family: 'Arial', sans-serif;
        animation: hologram 3s infinite alternate; /* Mengaktifkan animasi */
        background: linear-gradient(270deg, #d8b4fe, #ff99c8, #4B0082, #ffffff); /* Gradasi warna */
        -webkit-background-clip: text; /* Memotong latar belakang untuk teks */
        -webkit-text-fill-color: transparent; /* Mengisi warna teks dengan transparan */
    }

    /* Definisi animasi hologram */
    @keyframes hologram {
        0% {
            background-position: 0% 0%;
        }
        100% {
            background-position: 100% 100%;
        }
    }

    /* Gaya tombol Tambah Kategori */
    .btn-create {
        display: inline-block; /* Menampilkan tombol sebagai block inline */
        margin-bottom: 20px; /* Margin bawah tombol */
        padding: 10px 20px; /* Padding dalam tombol */
        background-color: #d8b4fe; /* Warna latar belakang tombol */
        color: white; /* Warna teks tombol */
        border-radius: 20px; /* Sudut tombol yang membulat */
        text-decoration: none; /* Menghilangkan garis bawah */
        font-family: 'Arial', sans-serif;
        font-size: 18px; /* Ukuran font tombol */
        transition: background-color 0.3s ease; /* Transisi saat hover */
    }

    /* Efek hover untuk tombol Tambah Kategori */
    .btn-create:hover {
        background-color: #ff99c8; /* Warna latar belakang saat hover */
    }

    /* Gaya tabel */
    .kategori-table {
        width: 100%; /* Tabel memenuhi lebar container */
        border-collapse: collapse; /* Menghilangkan spasi antara border sel */
    }

    .kategori-table th, .kategori-table td {
        border: 2px solid #d8b4fe; /* Border tabel */
        padding: 12px; /* Padding dalam sel tabel */
        text-align: center; /* Rata tengah untuk isi sel */
    }

    /* Gaya header tabel */
    .kategori-table th {
        background-color: #d8b4fe; /* Warna latar belakang header tabel */
        color: white; /* Warna teks header tabel */
    }

    /* Gaya isi tabel */
    .kategori-table td {
        font-family: 'Arial', sans-serif;
        background-color: #ffebf2; /* Warna latar belakang sel tabel */
    }

    /* Gaya tombol aksi */
    .btn-edit, .btn-delete {
        padding: 6px 12px; /* Padding dalam tombol */
        font-size: 14px; /* Ukuran font tombol */
        border-radius: 15px; /* Sudut tombol yang membulat */
        color: white; /* Warna teks tombol */
        text-decoration: none; /* Menghilangkan garis bawah */
        transition: background-color 0.3s ease; /* Transisi saat hover */
    }

    /* Gaya tombol Edit */
    .btn-edit {
        background-color: #6a0dad; /* Warna latar belakang tombol Edit */
    }

    /* Efek hover untuk tombol Edit */
    .btn-edit:hover {
        background-color: #a056ff; /* Warna latar belakang saat hover */
    }

    /* Gaya tombol Hapus */
    .btn-delete {
        background-color: #ff9999; /* Warna latar belakang tombol Hapus */
    }

    /* Efek hover untuk tombol Hapus */
    .btn-delete:hover {
        background-color: #ff6666; /* Warna latar belakang saat hover */
    }
</style>

<div class="container">
    <h1 class="hologram-text">Daftar Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn-create">Tambah Kategori</a>
    
    <table class="kategori-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->pengarang }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->tahun_terbit }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
