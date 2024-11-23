<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Laporan Produk Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            font-size: 12pt;
            line-height: 1.6;
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid black;
            padding-bottom: 20px;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        .nama-perusahaan {
            font-size: 24pt;
            font-weight: bold;
            margin: 10px 0;
        }
        .alamat {
            font-size: 11pt;
        }
        .nomor-surat {
            margin: 20px 0;
        }
        .tanggal {
            text-align: right;
            margin: 20px 0;
        }
        .perihal {
            margin: 20px 0;
        }
        .isi-surat {
            margin: 20px 0;
        }
        .detail-produk {
            margin: 20px 0;
            border-collapse: collapse;
            width: 100%;
        }
        .detail-produk th, .detail-produk td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .detail-produk th {
            background-color: #f2f2f2;
        }
        .ttd {
            margin-top: 50px;
            float: right;
            text-align: center;
        }
        .ttd-space {
            height: 80px;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        <div class="nama-perusahaan">POS INDONESIA</div>
    </div>

    <div class="nomor-surat">
        Nomor: {{ $catatanKeluar->id }}/PK/{{ date('m/Y', strtotime($catatanKeluar->waktu_keluar)) }}<br>
        Perihal: Laporan Produk Keluar
    </div>

    <div class="tanggal">
        {{ date('d F Y', strtotime($catatanKeluar->waktu_keluar)) }}
    </div>

    <div class="isi-surat">
        <p>Berikut ini kami sampaikan laporan pengiriman produk dengan detail sebagai berikut:</p>
        
        <table class="detail-produk">
            <tr>
                <th>Nama Produk</th>
                <td>{{ $catatanKeluar->produk->name }}</td>
            </tr>
            <tr>
                <th>Kode Produk</th>
                <td>{{ $catatanKeluar->produk->item_code }}</td>
            </tr>
            <tr>
                <th>Jumlah Keluar</th>
                <td>{{ $catatanKeluar->total_keluar }} unit</td>
            </tr>
            <tr>
                <th>Tanggal Keluar</th>
                <td>{{ date('d F Y', strtotime($catatanKeluar->waktu_keluar)) }}</td>
            </tr>
            <tr>
                <th>Daerah Pengiriman</th>
                <td>{{ $catatanKeluar->categoryDaerah->name }}</td>
            </tr>
            <tr>
                <th>Kode Daerah</th>
                <td>{{ $catatanKeluar->categoryDaerah->code }}</td>
            </tr>
        </table>

        <p>Demikian laporan ini kami sampaikan. Atas perhatiannya kami ucapkan terima kasih.</p>
    </div>

    <div class="ttd">
        <p>Staff Penginput,</p>
        <div class="ttd-space"></div>
        <p>{{ $catatanKeluar->user->name }}</p>
    </div>
</body>
</html>