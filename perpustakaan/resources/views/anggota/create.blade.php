{{-- resources/views/anggota/create.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    /* background dan tema warna */
    body {
        background: linear-gradient(135deg, #ffffff 0%, #ff99c8 100%);
        background-size: cover;
        font-family: 'Arial', sans-serif;
        position: relative; /* agar gelembung bisa diposisikan dengan baik */
        overflow: hidden; /* menyembunyikan gelembung yang keluar dari viewport */
    }
    /* gaya untuk gelembung */
    .bubble {
        position: absolute;
        border-radius: 50%;
        opacity: 0.5;
        pointer-events: none; /* agar gelembung tidak menghalangi interaksi */
    }

    /* menambahkan variasi gelembung */
    .bubble1 {
        width: 100px;
        height: 100px;
        background: rgba(255, 0, 150, 0.5);
        top: 10%;
        left: 20%;
        animation: bubbleAnimation 5s infinite;
    }

    .bubble2 {
        width: 150px;
        height: 150px;
        background: rgba(255, 182, 193, 0.5);
        top: 30%;
        right: 15%;
        animation: bubbleAnimation 7s infinite;
    }

    .bubble3 {
        width: 80px;
        height: 80px;
        background: rgba(255, 192, 203, 0.5);
        top: 50%;
        right: 15%;
        animation: bubbleAnimation 6s infinite;
    }
    .bubble4 {
        width: 120px;
        height: 120px;
        background: rgba(255, 255, 255, 0.5); /* warna putih */
        bottom: 20%;
        left: 10%;
        animation: bubbleAnimation 6.5s infinite;
    }

    .bubble5 {
        width: 90px;
        height: 90px;
        background: rgba(173, 216, 230, 0.5);
        bottom: 10%;
        right: 25%;
        animation: bubbleAnimation 7.5s infinite;
    }

    .bubble6 {
        width: 110px;
        height: 110px;
        background: rgba(255, 255, 255, 0.5);
        top: 40%;
        left: 40%;
        animation: bubbleAnimation 8s infinite;
    }

    /* animasi gelembung */
    @keyframes bubbleAnimation {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-30px);
        }
        100% {
            transform: translateY(0);
        }
    }
    /* gaya untuk judul "tambah Anggota" */
    h1 {
        text-align: center;
        color: #ffffff; /* warna putih untuk judul */
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        animation: slideDown 1s ease-in-out;
    }
    /* animasi slide untuk judul */
    @keyframes slideDown {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    /* gaya untuk form */
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        background-color: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: 0 auto;
        animation: popUp 1s ease-in-out;
    }
    /* animasi pop-up untuk form */
    @keyframes popUp {
        from {
            transform: scale(0.8);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }
    /* gaya untuk input form */
    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 2px solid #d8b4fe; /* warna pastel ungu */
        border-radius: 10px;
        outline: none;
        transition: border-color 0.3s ease;
    }
    /* efek fokus pada input */
    input[type="text"]:focus {
        border-color: #91a7ff; /* warna pastel biru */
    }
    /*gaya untuk tombol simpan */
    button {
        background-color: #ff99c8; /* warna pastel pink */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        animation: bounce 2s infinite;
    }
    /* efek hover dan animasi bounce untuk tombol */
    button:hover {
        background-color: #91a7ff; /* warna pastel biru */
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }
    /* gaya untuk tulisan "laravel" */
    .navbar-brand {
        color: #d8b4fe !important; /* warna pastel ungu */
        font-size: 24px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* menambah efek shadow */
    }
</style>

<h1>Tambah Anggota</h1>
<form action="{{ route('anggota.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="text" name="telepon" placeholder="Telepon" required>
    <button type="submit">Simpan</button>
</form>

<!-- menambahkan gelembung -->
<div class="bubble bubble1"></div>
<div class="bubble bubble2"></div>
<div class="bubble bubble3"></div>
<div class="bubble bubble4"></div>
<div class="bubble bubble5"></div>
<div class="bubble bubble6"></div>
@endsection