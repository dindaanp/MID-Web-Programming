@extends('layouts.app')

@section('content')
    <h1>Edit Kategori</h1>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama Kategori:</label>
        <input type="text" id="nama" name="nama" value="{{ $kategori->nama }}">
        <button type="submit">Simpan</button>
    </form>
@endsection