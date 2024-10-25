{{-- resources/views/anggota/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Anggota</h1>
    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggota->nama }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $anggota->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection