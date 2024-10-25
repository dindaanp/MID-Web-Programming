@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $buku->judul }}</h1>
    <p>Pengarang: {{ $buku->pengarang }}</p>
    <p>Penerbit: {{ $buku->penerbit }}</p>
    <p>Tahun Terbit: {{ $buku->tahun_terbit }}</p>
    <p>{{ $buku->deskripsi }}</p>

    <!-- Link ke ulasan buku -->
    <a href="{{ route('buku.reviews', $buku->id) }}" class="btn btn-primary">Lihat Ulasan</a>
</div>
@endsection