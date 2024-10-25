{{-- resources/views/create.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk background dengan putih dan pink pastel serta hologram */
    body {
        background: linear-gradient(135deg, #ffffff 0%, #ffebf2 100%);
        background-size: cover;
        font-family: 'Comic Sans MS', sans-serif; /* Font lucu */
        position: relative;
        overflow: hidden;
    }

    /* Gaya untuk judul */
    h1 {
        text-align: center;
        color: #4B0082; /* Warna ungu tua */
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Gaya untuk form */
    .form-group {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        font-size: 18px;
        color: #4B0082; /* Warna ungu tua */
    }

    select {
        width: 50%;
        padding: 10px;
        border-radius: 10px;
        border: 2px solid #d8b4fe;
        background-color: #ffebf2; /* Warna pastel pink */
        color: #4B0082;
        font-size: 16px;
    }

    button {
        background-color: #d8b4fe;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #ff99c8;
    }

    /* Tambahkan ikon buku bergerak */
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .icon {
        position: absolute;
        width: 50px;
        height: 50px;
        background-size: cover;
        animation: float 4s ease-in-out infinite;
    }

    .icon:nth-child(1) {
        top: 20%;
        left: 10%;
    }

    .icon:nth-child(2) {
        top: 60%;
        right: 10%;
    }

    /* Gaya untuk tulisan "Laravel" di navbar */
    .navbar-brand {
        color: #d8b4fe !important;
        font-size: 24px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Hologram efek */
    .hologram {
        text-align: center;
        background: linear-gradient(45deg, #ff99c8, #d8b4fe, #c5a3ff);
        background-size: 300% 300%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: holo 5s ease infinite;
        font-size: 18px;
    }

    @keyframes holo {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }
</style>

    <div class="container">
        <h1>Peminjaman Buku</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="anggota_id">Pilih Anggota:</label>
                <select name="anggota_id" id="anggota_id" required>
                    @foreach($anggota as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="buku_id">Pilih Buku:</label>
                <select name="buku_id" id="buku_id" required>
                    @foreach($buku as $buku)
                        <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Pinjam Buku</button>
        </form>
    </div>
    {{-- Menambahkan ikon bergerak --}}
    <div class="icon"></div>
    <div class="icon"></div>
@endsection
