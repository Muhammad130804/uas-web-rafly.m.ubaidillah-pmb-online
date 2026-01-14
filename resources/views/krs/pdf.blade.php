<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
        }
        .header h3 {
            margin: 5px 0;
            font-size: 14px;
            text-decoration: underline;
        }
        .header p {
            margin: 2px 0;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            background: #f2f2f2;
            text-align: center;
            padding: 5px;
        }
        td {
            padding: 6px;
        }

        .info td:first-child {
            width: 25%;
            font-weight: bold;
        }

        .qr {
            margin-top: 25px;
            text-align: right;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .footer p {
            margin: 2px 0;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>UNIVERSITAS MA'SOEM</h2>
    <p>Jl. Raya Cipacing No.22, Jatinangor, Sumedang</p>
    <p>Telp: (022) 7798340</p>
    <h3>KARTU RENCANA STUDI (KRS)</h3>
</div>

<table class="info">
    <tr>
        <td>NIM</td>
        <td>{{ $mahasiswa->nim }}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>{{ $mahasiswa->nama }}</td>
    </tr>
    <tr>
        <td>Angkatan</td>
        <td>{{ $mahasiswa->angkatan }}</td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>{{ $mahasiswa->prodi->nama_prodi }}</td>
    </tr>
    <tr>
        <td>Dosen Pembimbing</td>
        <td>{{ $mahasiswa->dosen->nama_dosen }}</td>
    </tr>
</table>

<h4 style="margin-top:15px;">Evaluasi KRS</h4>
<table>
    <tr>
        <th width="5%">No</th>
        <th>Keterangan</th>
        <th width="15%">Status</th>
    </tr>
    <tr>
        <td align="center">1</td>
        <td>Data Mahasiswa Lengkap</td>
        <td align="center">✔ Valid</td>
    </tr>
    <tr>
        <td align="center">2</td>
        <td>Program Studi Terdaftar</td>
        <td align="center">✔ Valid</td>
    </tr>
    <tr>
        <td align="center">3</td>
        <td>Dosen Pembimbing Telah Ditentukan</td>
        <td align="center">✔ Valid</td>
    </tr>
</table>

<div class="qr">
    <p><strong>QR Verifikasi</strong></p>
    <img src="data:image/png;base64,{{ $qr }}" width="100">
</div>

<div class="footer">
    <p>Jatinangor, {{ date('d F Y') }}</p>
    <p>Mengetahui,</p>
    <br><br>
    <p><strong>Admin PMB</strong></p>
</div>

</body>
</html>
