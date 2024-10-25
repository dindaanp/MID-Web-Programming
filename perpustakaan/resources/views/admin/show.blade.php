@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $buku->title }}</h1>
    <p>Pengarang: {{ $buku->author }}</p>
    <p>Deskripsi: {{ $buku->description }}</p>
    <a href="{{ route('buku.index') }}">Kembali ke daftar buku</a>
</div>
@endsection