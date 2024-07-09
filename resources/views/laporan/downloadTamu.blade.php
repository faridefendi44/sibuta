<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Data Tamu PDF</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .header-table {
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
            border: none;
        }
        .header-table img {
            width: 100px;
        }
        .header-table h1, .header-table h2, .header-table h3, .header-table p {
            margin: 0;
        }
        .header-table td {
            border: none;
        }
    </style>
</head>

<body>

<div class="header">
    <table class="header-table">
        <tr>
            <td style="width: 20%;">
                <img src="img/logo.png" alt="Logo">
            </td>
            <td style="width: 80%;">
                <h3>KEJAKSAAN REPUBLIK INDONESIA</h3>
                <h3>KEJAKSAAN TINGGI SUMATERA BARAT</h3>
                <h1>KEJAKSAAN NEGERI SIJUNJUNG</h1>
                <p>Jl. Jenderal Sudirman No.04, Muaro Sijunjung, Kabupaten Sijunjung</p>
                <p>27511 Telp. (0754) 20036 Fax. (0754) 21220 email: <a href="mailto:kjrsijunjung@gmail.com">kjrsijunjung@gmail.com</a></p>
            </td>
        </tr>
    </table>
    <hr>
    <div style="text-align: center;">

        <h3>BUKU TAMU</h3>
        <h3>KEJAKSAAN NEGERI SIJUNJUNG</h3>
    </div>
    {{-- <h3>{{ $start_date }} - {{ $end_date }}</h3> --}}

</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Asal Instansi</th>
            <th>Tanggal</th>
            <th>No Telepon</th>
            <th>Pihak Yang Ingin Ditemui</th>
            <th>Keperluan</th>
            <th>Tanda Tangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tamus as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->asal_instansi }}</td>
                <td>{{ $item->tanggal_bertamu }} <br> pukul: {{$item->jam_bertamu}}</td>
                <td>{{ $item->no_wa }}</td>
                <td>{{ $item->pegawai->nama }} - {{ $item->pegawai->jabatan }}</td>
                <td>
                    {{ $item->keperluan }}
                </td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>

</html>
