<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Produk Keluar</title>
    <style>
        @page {
            size: landscape;
            margin: 1cm;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 10pt; /* Ukuran font dikecilkan untuk landscape */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid black;
            padding-bottom: 15px;
        }
        .company-name {
            font-size: 18pt; /* Ukuran nama perusahaan disesuaikan */
            font-weight: bold;
            margin: 5px 0;
        }
        .report-title {
            font-size: 14pt;
            font-weight: bold;
            margin: 15px 0;
            text-align: center;
        }
        .report-period {
            text-align: center;
            margin-bottom: 15px;
            font-size: 10pt;
        }
        .summary-box {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
        .summary-title {
            font-weight: bold;
            margin-bottom: 8px;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Mengubah menjadi 4 kolom */
            gap: 10px;
        }
        .summary-item {
            background: white;
            padding: 8px;
            border-radius: 4px;
            font-size: 9pt;
        }
        .main-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 9pt; /* Ukuran font tabel dikecilkan */
        }
        .main-table th, .main-table td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }
        .main-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            white-space: nowrap; /* Mencegah wrapping pada header */
        }
        .main-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .main-table td {
            white-space: nowrap; /* Mencegah wrapping pada sel */
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 9pt;
        }
        /* Optimasi untuk landscape */
        .container {
            max-width: 100%;
            margin: 0 auto;
        }
        /* Style untuk mengatur lebar kolom */
        .main-table th:nth-child(1), .main-table td:nth-child(1) { width: 3%; } /* No */
        .main-table th:nth-child(2), .main-table td:nth-child(2) { width: 10%; } /* Nama Produk */
        .main-table th:nth-child(3), .main-table td:nth-child(3) { width: 7%; } /* Kode */
        .main-table th:nth-child(4), .main-table td:nth-child(4) { width: 8%; } /* Kategori */
        .main-table th:nth-child(5), .main-table td:nth-child(5) { width: 8%; } /* Staff */
        .main-table th:nth-child(6), .main-table td:nth-child(6) { width: 7%; } /* IDO */
        .main-table th:nth-child(7), .main-table td:nth-child(7) { width: 7%; } /* SN Awal */
        .main-table th:nth-child(8), .main-table td:nth-child(8) { width: 7%; } /* SN Akhir */
        .main-table th:nth-child(9), .main-table td:nth-child(9) { width: 6%; } /* Jml Kirim */
        .main-table th:nth-child(10), .main-table td:nth-child(10) { width: 6%; } /* Jml Keluar */
        .main-table th:nth-child(11), .main-table td:nth-child(11) { width: 5%; } /* Sisa */
        .main-table th:nth-child(12), .main-table td:nth-child(12) { width: 7%; } /* Tgl Masuk */
        .main-table th:nth-child(13), .main-table td:nth-child(13) { width: 7%; } /* Tgl Keluar */
        .main-table th:nth-child(14), .main-table td:nth-child(14) { width: 7%; } /* Daerah */
        .main-table th:nth-child(15), .main-table td:nth-child(15) { width: 5%; } /* Kode */
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="company-name">POS INDONESIA</div>
        </div>

        <div class="report-title">LAPORAN PRODUK KELUAR</div>
        <div class="report-period">Periode: {{ date('d F Y', strtotime($catatanKeluar->first()->waktu_keluar)) }} - {{ date('d F Y', strtotime($catatanKeluar->last()->waktu_keluar)) }}</div>

        <div class="summary-box">
            <div class="summary-title">Ringkasan Laporan:</div>
            <div class="summary-grid">
                <div class="summary-item">
                    <div>Total Produk Keluar:</div>
                    <strong>{{ $catatanKeluar->sum('total_keluar') }} unit</strong>
                </div>
                <div class="summary-item">
                    <div>Total Sisa Barang:</div>
                    <strong>{{ $catatanKeluar->sum('produk.total_produk') }} unit</strong>
                </div>
                <div class="summary-item">
                    <div>Total Transaksi:</div>
                    <strong>{{ $catatanKeluar->count() }}</strong>
                </div>
                <div class="summary-item">
                    <div>Total Kategori:</div>
                    <strong>{{ $catatanKeluar->groupBy('produk.categoryProduk.name')->count() }}</strong>
                </div>
            </div>
        </div>

        <table class="main-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Kode Produk</th>
                    <th>Kategori</th>
                    <th>Staff</th>
                    <th>No. IDO</th>
                    <th>SN Awal</th>
                    <th>SN Akhir</th>
                    <th>Jml Kirim</th>
                    <th>Jml Keluar</th>
                    <th>Sisa</th>
                    <th>Tgl Masuk</th>
                    <th>Tgl Keluar</th>
                    <th>Daerah</th>
                    <th>Kode</th>
                </tr>
            </thead>
            <tbody>
                @foreach($catatanKeluar as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->produk->name }}</td>
                    <td>{{ $data->produk->item_code }}</td>
                    <td>{{ $data->produk->categoryProduk->name }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->produk->nomor_ido }}</td>
                    <td>{{ $data->produk->serial_number_awal }}</td>
                    <td>{{ $data->produk->serial_number_akhir }}</td>
                    <td>{{ $data->produk->total_dikirim }}</td>
                    <td>{{ $data->total_keluar }}</td>
                    <td>{{ $data->produk->total_produk }}</td>
                    <td>{{ date('d/m/Y', strtotime($data->produk->waktu_masuk)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($data->waktu_keluar)) }}</td>
                    <td>{{ $data->categoryDaerah->name }}</td>
                    <td>{{ $data->categoryDaerah->code }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Dicetak pada: {{ date('d F Y H:i:s') }}</p>
            <p>Dicetak oleh: {{ auth()->user()->name }}</p>
        </div>
    </div>
</body>
</html>