{{-- resources/views/buku/kategori.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kategori: {{ $kategori->nama }}</h1>
    
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori->buku as $b)
            <tr>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->pengarang }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->tahun_terbit }}</td>
                <td>
                    <a href="{{ route('buku.reviews', $b->id) }}" class="btn btn-info btn-sm">Lihat Ulasan</a>
                    <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection