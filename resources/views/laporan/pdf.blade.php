<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan Pendapatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        table td:first-child {
            width: 5%;
        }
    </style>
</head>

<body>
<div class="container">
    <h3 class="text-center">Laporan Pendapatan</h3>
    <h4 class="text-center">
        Tanggal {{ tanggal_indonesia($awal, false) }}
        s/d
        Tanggal {{ tanggal_indonesia($akhir, false) }}
    </h4>

    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Penjualan</th>
            <th>Pembelian</th>
            <th>Pengeluaran</th>
            <th>Pendapatan</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $row)
            <tr>
                @foreach ($row as $col)
                    <td>{{ $col }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
