@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ulasan untuk Buku: {{ $buku->judul }}</h1>

    <!-- Form Tambah Ulasan -->
    @auth
    <form action="{{ route('reviews.store', $buku->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Tulis Ulasan:</label>
            <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Kirim Ulasan</button>
    </form>
    @endauth

    <!-- Daftar Ulasan -->
    <h2 class="mt-4">Daftar Ulasan:</h2>
    @if($buku->reviews->isEmpty())
        <p>Belum ada ulasan untuk buku ini.</p>
    @else
        @foreach($buku->reviews as $review)
            <div class="review">
                <p><strong>{{ optional($review->user)->name ?? 'Anonim' }}</strong> menulis:</p>
                <p>{{ $review->content }}</p>
                <hr>
            </div>
        @endforeach
    @endif
</div>
@endsection
