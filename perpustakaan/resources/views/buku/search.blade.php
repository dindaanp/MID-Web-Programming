<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Buku</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Hasil Pencarian Buku</h1>

        @if($buku->isEmpty())
            <p>Tidak ada buku yang ditemukan.</p>
        @else
            <ul>
                @foreach($buku as $item)
                    <li>{{ $item->judul }} oleh {{ $item->penulis }}</li>
                @endforeach
            </ul>
        @endif

        <a href="{{ url('/home') }}">Kembali ke Dashboard</a>
    </div>
</body>
</html>