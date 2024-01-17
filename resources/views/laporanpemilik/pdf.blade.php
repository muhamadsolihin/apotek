<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <!-- Include your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Laporan PDF</h1>
    <!-- <p>S: {{ $startDate }}</p>
    <p>End Date: {{ $endDate }}</p> -->

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Jumlah</th>
                <th>Nama Obat</th>
                <th>Jenis Obat</th>
                <th>Tanggal Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksiItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->jumlah_stok }}</td>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->jenis_obat }}</td>
                    <td>{{ $item->expired_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
