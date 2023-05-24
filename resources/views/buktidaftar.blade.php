<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link type="text/css" href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <style>
        #watermark {
            position: fixed;
            top: 7cm;
            left: 4.4cm;
            /* Change image dimensions */
            width: 10cm;
            height: 10cm;
            /* Your watermark should be behind every content */
            z-index: -1000;
            opacity: 0.2;
        }

        .table-border {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-padding {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .table-bg-blue {
            background-color: #0d6efd;
            color: #f8f9fa;
            font-weight: 700 !important;
        }

        .fw-bold {
            font-weight: 700 !important;
        }

        .last {
            position: absolute;
            bottom: 10px;
            left: 0px;
            right: 0px;
            height: 100px;
        }
    </style>
</head>

<body>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <img src="{{ asset('images/logo.png') }}" height="9%" width="100%" />
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                    <h1 class="text-center">SMA Negeri 1 Palmatak</h1>
                    <h6 class="text-center">
                        Jalan M. Yusuf, Kel. Tebang, Kec. Palmatak, Kab. Kepulauan Anambas Prov. Kepulauan Riau
                    </h6>
                </td>
                <td class="text-center">
                    <img src="{{ asset('images/tut wuri handayani.png') }}" height="10%" width="66%" />
                </td>
            </tr>
        </tbody>
    </table>
    <hr>

    <h2 class="text-center mb-3">{{ $title }}</h2>
    {{-- <img src="{{ $pasphoto['file_name'] }}" width="300" height="400" style="border: black solid 1px"> --}}
    {{-- {{ $pasphoto['file_name'] }} --}}
    <br>
    <table class="table">
        {{-- Data Pendaftaran --}}
        <thead class="text-center">
            <tr class="table-bg-blue">
                <th class="table-padding fw-bold" colspan="3">
                    Data Pendaftaran
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-padding" width="30">1.</td>
                <td class="table-padding">Tahun Ajaran</td>
                <td class="table-padding" width="260">: {{ $userdaftar[0]['tahun_ajaran'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">2.</td>
                <td class="table-padding">ID Pendaftaran</td>
                <td class="table-padding">: {{ $userdaftar[0]['id_daftar'] }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        {{-- Data Pribadi --}}
        <thead class="text-center">
            <tr class="table-bg-blue">
                <th class="table-padding fw-bold" colspan="3">
                    Data Pribadi
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-padding" width="30">3.</td>
                <td class="table-padding">Nama</td>
                <td class="table-padding" width="260">: {{ ucwords(strtolower($datadiri[0]['nama'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">4.</td>
                <td class="table-padding">Jenis Kelamin</td>
                <td class="table-padding">: {{ ucwords($datadiri[0]['jenis_kelamin']) }}</td>
            </tr>
            <tr>
                <td class="table-padding">5.</td>
                <td class="table-padding">NISN</td>
                <td class="table-padding">: {{ $datadiri[0]['nisn'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">6.</td>
                <td class="table-padding">NIK</td>
                <td class="table-padding">: {{ $datadiri[0]['nik'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">7.</td>
                <td class="table-padding">Tempat Lahir</td>
                <td class="table-padding">: {{ ucwords(strtolower($datadiri[0]['tempat_lahir'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">8.</td>
                <td class="table-padding">Tanggal Lahir</td>
                <td class="table-padding">: {{ App\Helpers\UserHelper::dateFormat($datadiri[0]['tanggal_lahir']) }}
                </td>
            </tr>
            <tr>
                <td class="table-padding">9.</td>
                <td class="table-padding">Alamat</td>
                <td class="table-padding text-wrap">: {{ ucwords(strtolower($datadiri[0]['alamat'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">10.</td>
                <td class="table-padding">Agama</td>
                <td class="table-padding">: {{ ucwords(strtolower($datadiri[0]['agama'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">11.</td>
                <td class="table-padding">Berkebutuhan Khusus</td>
                <td class="table-padding">: {{ ucwords(strtolower($datadiri[0]['kebutuhan_khusus'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">12.</td>
                <td class="table-padding">Tinggal Bersama Orang Tua</td>
                <td class="table-padding">: {{ ucwords(strtolower($datadiri[0]['tinggal_bersama_ortu'])) }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        {{-- Data Ayah --}}
        <thead class="text-center">
            <tr class="table-bg-blue">
                <th class="table-padding fw-bold" colspan="3">
                    Data Ayah
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-padding" width="30">13.</td>
                <td class="table-padding">Nama</td>
                <td class="table-padding" width="260">: {{ ucwords(strtolower($dataayah[0]['nama'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">14.</td>
                <td class="table-padding">NIK</td>
                <td class="table-padding">: {{ $dataayah[0]['nik'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">15.</td>
                <td class="table-padding">Kontak</td>
                <td class="table-padding">: {{ $dataayah[0]['kontak'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">16.</td>
                <td class="table-padding">Pendidikan Terakhir</td>
                <td class="table-padding">: {{ strtoupper($dataayah[0]['pendidikan']) }}</td>
            </tr>
            <tr>
                <td class="table-padding">17.</td>
                <td class="table-padding">Pekerjaan</td>
                <td class="table-padding">: {{ ucwords(strtolower($dataayah[0]['pekerjaan'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">18.</td>
                <td class="table-padding">Penghasilan per Bulan</td>
                <td class="table-padding">: {{ App\Helpers\UserHelper::penghasilan($dataayah[0]['penghasilan']) }}</td>
            </tr>
            <tr>
                <td class="table-padding">19.</td>
                <td class="table-padding">Alamat</td>
                <td class="table-padding text-wrap">: {{ ucwords(strtolower($dataayah[0]['alamat'])) }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        {{-- Data Ibu --}}
        <thead class="text-center">
            <tr class="table-bg-blue">
                <th class="table-padding fw-bold" colspan="3">
                    Data Ibu
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-padding" width="30">13.</td>
                <td class="table-padding">Nama</td>
                <td class="table-padding" width="260">: {{ ucwords(strtolower($dataibu[0]['nama'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">20.</td>
                <td class="table-padding">NIK</td>
                <td class="table-padding">: {{ $dataibu[0]['nik'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">21.</td>
                <td class="table-padding">Kontak</td>
                <td class="table-padding">: {{ $dataibu[0]['kontak'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">22.</td>
                <td class="table-padding">Pendidikan Terakhir</td>
                <td class="table-padding">: {{ strtoupper($dataibu[0]['pendidikan']) }}</td>
            </tr>
            <tr>
                <td class="table-padding">23.</td>
                <td class="table-padding">Pekerjaan</td>
                <td class="table-padding">: {{ ucwords(strtolower($dataibu[0]['pekerjaan'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">24.</td>
                <td class="table-padding">Penghasilan per Bulan</td>
                <td class="table-padding">: {{ App\Helpers\UserHelper::penghasilan($dataibu[0]['penghasilan']) }}</td>
            </tr>
            <tr>
                <td class="table-padding">25.</td>
                <td class="table-padding">Alamat</td>
                <td class="table-padding text-wrap">: {{ ucwords(strtolower($dataibu[0]['alamat'])) }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        {{-- Data Wali --}}
        <thead class="text-center">
            <tr class="table-bg-blue">
                <th class="table-padding fw-bold" colspan="3">
                    Data Wali
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-padding" width="30">26.</td>
                <td class="table-padding">Nama</td>
                <td class="table-padding" width="260">: {{ ucwords(strtolower($datawali[0]['nama'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">27.</td>
                <td class="table-padding">NIK</td>
                <td class="table-padding">: {{ $datawali[0]['nik'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">28.</td>
                <td class="table-padding">Kontak</td>
                <td class="table-padding">: {{ $datawali[0]['kontak'] }}</td>
            </tr>
            <tr>
                <td class="table-padding">29.</td>
                <td class="table-padding">Pendidikan Terakhir</td>
                <td class="table-padding">: {{ strtoupper($datawali[0]['pendidikan']) }}</td>
            </tr>
            <tr>
                <td class="table-padding">30.</td>
                <td class="table-padding">Pekerjaan</td>
                <td class="table-padding">: {{ ucwords(strtolower($datawali[0]['pekerjaan'])) }}</td>
            </tr>
            <tr>
                <td class="table-padding">31.</td>
                <td class="table-padding">Penghasilan per Bulan</td>
                <td class="table-padding">: {{ App\Helpers\UserHelper::penghasilan($datawali[0]['penghasilan']) }}
                </td>
            </tr>
            <tr>
                <td class="table-padding">32.</td>
                <td class="table-padding">Alamat</td>
                <td class="table-padding text-wrap">: {{ ucwords(strtolower($datawali[0]['alamat'])) }}</td>
            </tr>
        </tbody>
    </table>
    <div class="last">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <h6>Mengetahui,</h6>
                        <h6>Orang Tua / Wali</h6>
                        <br>
                        <br>
                        <br>
                        <h6><u>.......................................</u></h6>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
