<!-- resources/views/anggota/wishlist.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Wishlist Buku</h1>

    <ul>
        @foreach($wishlist as $buku)
            <li>{{ $buku->judul }}</li>
        @endforeach
    </ul>
@endsection