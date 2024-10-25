<!-- resources/views/buku/return.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Books</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Link ke CSS jika ada -->

    <style>
        /* Background pastel pink dengan nuansa lucu */
        body {
            background: linear-gradient(135deg, #ffffff 0%, #ffebf2 100%);
            font-family: 'Comic Sans MS', sans-serif; /* Font lucu */
            color: #4B0082; /* Warna ungu tua */
            overflow: hidden; /* Agar bubble tidak melewati batas */
        }

        /* Gaya untuk container */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk judul */
        h1 {
            text-align: center;
            color: #d8b4fe; /* Warna pastel ungu */
            margin-bottom: 30px;
            font-size: 28px;
        }

        /* Gaya form */
        .form-group {
            margin-bottom: 15px;
            text-align: center;
        }

        label {
            font-size: 16px;
            color: #4B0082;
        }

        input[type="text"] {
            padding: 10px;
            width: 80%;
            border: 2px solid #d8b4fe;
            border-radius: 10px;
            background-color: #ffebf2;
            color: #4B0082;
        }

        /* Gaya tombol */
        button {
            background-color: #d8b4fe;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff99c8;
        }

        /* Gaya tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table, th, td {
            border: 1px solid #d8b4fe;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #d8b4fe;
            color: white;
        }

        td {
            background-color: #ffebf2;
        }

        /* Bubbles styling */
        .bubble {
            position: absolute;
            background-color: rgba(216, 180, 254, 0.7); /* Warna pastel ungu */
            border-radius: 50%;
            animation: moveBubble 10s infinite;
        }

        /* Gerakan gelembung */
        @keyframes moveBubble {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh);
                opacity: 0;
            }
        }

        /* Menghasilkan banyak gelembung */
        .bubble:nth-child(1) { width: 20px; height: 20px; left: 10%; animation-duration: 8s; animation-delay: 0s; }
        .bubble:nth-child(2) { width: 30px; height: 30px; left: 20%; animation-duration: 10s; animation-delay: 2s; }
        .bubble:nth-child(3) { width: 40px; height: 40px; left: 30%; animation-duration: 12s; animation-delay: 4s; }
        .bubble:nth-child(4) { width: 25px; height: 25px; left: 40%; animation-duration: 9s; animation-delay: 1s; }
        .bubble:nth-child(5) { width: 35px; height: 35px; left: 50%; animation-duration: 11s; animation-delay: 3s; }
        .bubble:nth-child(6) { width: 45px; height: 45px; left: 60%; animation-duration: 13s; animation-delay: 5s; }
        .bubble:nth-child(7) { width: 20px; height: 20px; left: 70%; animation-duration: 8s; animation-delay: 0s; }
        .bubble:nth-child(8) { width: 30px; height: 30px; left: 80%; animation-duration: 10s; animation-delay: 2s; }
        .bubble:nth-child(9) { width: 40px; height: 40px; left: 90%; animation-duration: 12s; animation-delay: 4s; }
        .bubble:nth-child(10) { width: 25px; height: 25px; left: 15%; animation-duration: 9s; animation-delay: 1s; }
    </style>

</head>
<body>
    <div class="container">
        <h1>Pengembalian Buku</h1>

        <form action="{{ route('buku.return.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="buku_id">ID Buku:</label>
                <input type="text" id="buku_id" name="buku_id" required>
            </div>
            <div class="form-group">
                <label for="anggota_id">ID Anggota:</label>
                <input type="text" id="anggota_id" name="anggota_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
        </form>

        <h2>Daftar Buku yang Sedang Dipinjam</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Nama Anggota</th>
                    <th>Tanggal Pinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $pinjam)
                <tr>
                    <td>{{ $pinjam->buku_id }}</td>
                    <td>{{ $pinjam->buku->judul }}</td>
                    <td>{{ $pinjam->anggota->nama }}</td>
                    <td>{{ $pinjam->created_at->format('d-m-Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Menambahkan elemen gelembung -->
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>

</body>
</html>