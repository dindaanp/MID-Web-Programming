@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pendaftaran Anggota</h5>
                    <ul>
                        <li><a href="{{ route('anggota.create') }}">Tambah Anggota</a></li>
                        <li><a href="{{ route('anggota.index') }}">Lihat Anggota</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Buku</h5>
                    <ul>
                        <li><a href="{{ route('buku.create') }}">Tambah Buku</a></li>
                        <li><a href="{{ route('buku.index') }}">Lihat Buku</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Kategori</h5>
                    <ul>
                        <li><a href="{{ route('kategori.create') }}">Tambah Kategori</a></li>
                        <li><a href="{{ route('kategori.index') }}">Lihat Kategori</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statistik Peminjaman</h5>
                    <ul>
                        <li><a href="{{ route('buku.populer') }}">Daftar Buku Populer</a></li>
                        <li><a href="{{ route('peminjaman.statistik') }}">Lihat Statistik Peminjaman</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection