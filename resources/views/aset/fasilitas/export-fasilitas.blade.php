<!DOCTYPE html>
<html>
<head>
    <title>Data Fasilitas</title>
    <style>
        @page {
            size: A4 landscape; /* Mengatur ukuran halaman menjadi landscape */
            margin: 20mm; /* Mengatur margin halaman */
        }
        body {
            font-family: Arial, sans-serif;
            background-color: white; /* Pastikan latar belakang putih */
            color: black; /* Pastikan teks berwarna hitam */
            position: relative; /* Menambahkan posisi relatif untuk body */
            height: 100vh; /* Mengatur tinggi body untuk memastikan footer di bawah */
        }
        table {
            width: 100%; /* Mengatur lebar tabel menjadi 100% */
            border-collapse: collapse;
            margin: 20px 0; /* Menambahkan jarak atas dan bawah untuk tabel */
            table-layout: fixed; /* Mengatur layout tabel agar tetap */
        }
        th, td {
            border: 1px solid black;
            padding: 4px; /* Mengurangi padding untuk menghemat ruang */
            text-align: left; /* Menyelaraskan teks ke kiri */
            font-size: 10px; /* Mengurangi ukuran font untuk menghemat ruang */
            word-wrap: break-word; /* Memungkinkan teks untuk memanjang ke bawah */
            vertical-align: top; /* Memastikan teks di atas */
        }
        th {
            background-color: #f2f2f2;
            text-align: center; /* Menyelaraskan teks header ke tengah */
        }
        /* Atur lebar kolom */
        th:nth-child(1), td:nth-child(1) { width: 30px; } /* No */
        th:nth-child(2), td:nth-child(2) { width: 100px; } /* Hostname */
        th:nth-child(3), td:nth-child(3) { width: 70px; } /* Kode Region */
        th:nth-child(4), td:nth-child(4) { width: 70px; } /* Kode Site */
        th:nth-child(5), td:nth-child(5) { width: 50px; } /* No Rack */
        th:nth-child(6), td:nth-child(6) { width: 70px; } /* Kode Fasilitas */
        th:nth-child(7), td:nth-child(7) { width: 50px; } /* Fasilitas Ke */
        th:nth-child(8), td:nth-child(8) { width: 70px; } /* Kode Brand */
        th:nth-child(9), td:nth-child(9) { width: 50px; } /* Type */
        th:nth-child(10), td:nth-child(10) { width: 70px; } /* Serial Number */
        th:nth-child(11), td:nth-child(11) { width: 50px; } /* Jumlah Fasilitas */
        th:nth-child(12), td:nth-child(12) { width: 50px; } /* Status */
        th:nth-child(13), td:nth-child(13) { width: 50px; } /* U Awal */
        th:nth-child(14), td:nth-child(14) { width: 50px; } /* U Akhir */
        .title {
            text-align: center; /* Menyelaraskan judul ke tengah */
            font-size: 16px; /* Ukuran font judul */
            font-weight: bold; /* Menebalkan font judul */
            margin-bottom: 10px; /* Jarak bawah judul */
        }
        .footer {
            position: absolute; /* Mengatur posisi footer */
            bottom: 5px; /* Jarak dari bawah, ditingkatkan untuk menjauh dari tabel */
            left: 20px; /* Jarak dari kiri */
            font-size: 10px; /* Ukuran font footer */
        }
        .signature-container {
            position: absolute; /* Mengatur posisi tanda tangan */
            right: 20px; /* Jarak dari kanan */
            text-align: right; /* Menyelaraskan tanda tangan ke kanan */
            width: 200px; /* Lebar kolom tanda tangan */
        }
        .signature {
            border-top: 1px solid black; /* Garis untuk tanda tangan */
            margin-top: 5px; /* Jarak atas untuk tanda tangan */
            padding-top: 10px; /* Jarak dalam untuk tanda tangan */
            width: 100%; /* Lebar garis sesuai dengan kolom */
            text-align: center; /* Menyelaraskan garis ke tengah */
        }
    </style>
</head>
<body>
    <div class="title">Data Fasilitas</div> <!-- Judul di tengah -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Hostname</th>
                <th>Kode Region</th>
                <th>Kode Site</th>
                <th>No Rack</th>
                <th>Kode Fasilitas</th>
                <th>Fasilitas Ke</th>
                <th>Kode Brand</th>
                <th>Type</th>
                <th>Serial Number</th>
                <th>Jumlah Fasilitas</th>
                <th>Status</th>
                <th>U Awal</th>
                <th>U Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fasilitas as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->hostname }}</td>
                    <td>{{ $item->kode_region }}</td>
                    <td>{{ $item->kode_site }}</td>
                    <td>{{ $item->no_rack }}</td>
                    <td>{{ $item->kode_fasilitas }}</td>
                    <td>{{ $item->fasilitas_ke }}</td>
                    <td>{{ $item->kode_brand }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->serialnumber }}</td>
                    <td>{{ $item->jml_fasilitas }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->uawal }}</td>
                    <td>{{ $item->uakhir }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">Tanggal Ekspor: {{ date('d-m-Y H:i:s') }}</div> <!-- Tanggal dan waktu di kiri paling bawah -->
    <div class="signature-container">
        <p style="text-align: center; margin: 0;">Tanda Tangan</p> <!-- Label untuk tanda tangan, diselaraskan ke kiri -->
        <p></p>
        <p style="margin: 0; padding-top: 5px;">__________________________</p> <!-- Garis untuk tanda tangan -->
    </div>
</body>
</html>
