@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buku Populer</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Jumlah Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukuPopuler as $buku)
                <tr>
                    <td>{{ $buku->title }}</td>
                    <td>{{ $buku->author }}</td>
                    <td>{{ $buku->peminjaman_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection