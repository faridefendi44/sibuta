<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download Data Surat PDF</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
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

        .header-table h1,
        .header-table h2,
        .header-table h3,
        .header-table p {
            margin: 0;
        }

        .header-table td {
            border: none;
        }

        .signature {
            page-break-inside: avoid;
            text-align: right;
            margin-top: 10px;
        }

        .signature .first {
            margin-right: 136px;
        }

        .signature .name {
            font-weight: 700;
            text-decoration: underline;
            margin-right: 75px;
        }

        .signature .position {
            font-weight: 700;
        }

        .signature .nip {
            margin-right: 25px;
        }

        .break-word {
            word-break: break-word;
        }

        @media print {
            body {
                width: 100%;
                height: 100%;
            }

            .page-break {
                page-break-before: always;
            }

            .header {
                page-break-after: avoid;
            }

            table {
                page-break-inside: auto;
                width: 100%;
                margin: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            td,
            th {
                page-break-inside: avoid;
            }

            .signature {
                page-break-inside: avoid;
                page-break-after: always;
            }
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
                    <p>27511 Telp. (0754) 20036 Fax. (0754) 21220 email: <a
                            href="mailto:kjrsijunjung@gmail.com">kjrsijunjung@gmail.com</a></p>
                </td>
            </tr>
        </table>
        <hr>
        <div style="text-align: center;">
            <h3>REKAPAN SURAT MASUK</h3>
            <h3>KEJAKSAAN NEGERI SIJUNJUNG</h3>
            <h3>Periode: {{ $start_date }} - {{ $end_date }}</h3>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengirim</th>
                <th>Asal Surat</th>
                <th>Tanggal Surat</th>
                <th style="width: 80px;" class="break-word">Nomor Surat</th>
                <th>Perihal Surat</th>
                <th>Tanggal Masuk Surat</th>
                <th style="width: 150px;" class="break-word">Lampiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surats as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->pengirim }}</td>
                <td>{{ $item->asal_surat }}</td>
                <td>{{ $item->tanggal_surat }}</td>
                <td class="break-word">{{ $item->no_surat }}</td>
                <td>{{ $item->perihal }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->setTimezone('Asia/Jakarta')->locale('id')->isoFormat('D MMMM YYYY HH:mm:ss') }}</td>
                <td  class="break-word">
                    @foreach (explode(', ', $item->lampiran) as $lampiran)
                    <a target="_blank" href="{{ $lampiran }}">{{ basename($lampiran) }}</a><br>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p class="first">Mengetahui</p>
        <p class="position">Kepala Sub Bagian Pembinaan</p>
        <div style="margin-top: 50px;" class="mt-12">
            <p class="name">(Amrul Afdal, S.H.)</p>
            <p class="nip">NIP. 19686024 200812 1001</p>
        </div>
    </div>

</body>

</html>
