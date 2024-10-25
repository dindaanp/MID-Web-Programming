@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Statistik Peminjaman</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Buku</th>
                <th>Total Peminjaman</th>
                <th>Periode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistikPeminjaman as $data)
                <tr>
                    <td>{{ $data->buku }}</td>
                    <td>{{ $data->total_peminjaman }}</td>
                    <td>{{ $data->periode }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection