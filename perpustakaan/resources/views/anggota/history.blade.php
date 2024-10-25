<!-- File: resources/views/peminjaman/history.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
        /* Background dengan tema warna pastel */
        body {
            background: linear-gradient(135deg, #91a7ff 0%, #ff99c8 50%, #d8b4fe 100%);
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #ffffff;
        }

        /* Gaya untuk judul halaman */
        h1 {
            text-align: center;
            color: #ffffff; /* Warna putih untuk judul */
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            animation: slideDown 1s ease-in-out;
        }

        /* Animasi slide untuk judul */
        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Gaya untuk tabel */
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            animation: popUp 1s ease-in-out;
        }

        /* Animasi pop-up untuk tabel */
        @keyframes popUp {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Gaya untuk header tabel */
        th {
            background-color: #d8b4fe; /* Warna pastel ungu */
            color: white;
            padding: 10px;
            text-align: left;
        }

        /* Gaya untuk sel tabel */
        td {
            padding: 10px;
            border-bottom: 1px solid #e2e2e2;
        }

        /* Efek hover pada baris tabel */
        tr:hover {
            background-color: rgba(255, 153, 200, 0.5); /* Warna pastel pink saat hover */
            animation: glow 0.5s ease-in-out infinite alternate;
        }

        /* Animasi glow untuk baris tabel saat hover */
        @keyframes glow {
            from {
                box-shadow: 0 0 10px rgba(255, 153, 200, 0.8);
            }
            to {
                box-shadow: 0 0 20px rgba(255, 153, 200, 1);
            }
        }

        /* Mengatur warna border pada tabel */
        table {
            border: 2px solid #d8b4fe; /* Warna border ungu pastel */
        }
    </style>
    
</head>
<body>
    <div class="container">
        <h1>Riwayat Peminjaman</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayatPeminjaman as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->buku_id }}</td>
                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                    <td>{{ $peminjaman->tanggal_kembali }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>