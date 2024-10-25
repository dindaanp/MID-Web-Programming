{{-- resources/views/buku/create.blade.php --}}
@extends('layouts.app')

@section('content')
<h1>Tambah Buku</h1>
<form action="{{ route('buku.store') }}" method="POST">
    @csrf
    <input type="text" name="judul" placeholder="Judul" required>
    <input type="text" name="pengarang" placeholder="Pengarang" required>
    <input type="text" name="penerbit" placeholder="Penerbit" required>
    <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required>
    <select name="kategori_id" required>
        @foreach ($kategori as $kat)
            <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
        @endforeach
    </select>
    <button type="submit">Simpan</button>
</form>
@endsection