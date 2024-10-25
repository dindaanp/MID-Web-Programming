{{-- resources/views/buku/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{ route('buku.create') }}" class="btn btn-success mb-3">Tambah Buku</a> <!-- Tombol tambah buku -->
    
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->pengarang }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun_terbit }}</td>
                <td>{{ $item->kategori->nama }}</td>
                <td>
                    <!-- Link untuk melihat review -->
                    <a href="{{ route('buku.reviews', $item->id) }}" class="btn btn-info btn-sm">Lihat Review</a>

                    <!-- Link untuk mengedit buku -->
                    <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <!-- Form untuk menghapus buku -->
                    <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection