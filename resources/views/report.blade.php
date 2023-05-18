<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <style>
        #watermark {
            position: fixed;
            top: 2cm;
            left: 6.5cm;
            /* Change image dimensions */
            width: 15cm;
            height: 15cm;
            /* Your watermark should be behind every content */
            z-index: -1000;
            opacity: 0.2;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="watermark">
        <img src="{{ asset('images/logo.png') }}" height="100%" width="100%" />
    </div>
    <div id="app">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">SMA Negeri 1 Palmatak</h1>
                <h4 class="text-center">
                    Jalan M. Yusuf, Kel. Tebang, Kec. Palmatak, Kab. Kepulauan Anambas Prov. Kepulauan Riau
                </h4>
                <hr>

                <h2 class="text-center mb-3">{{ $title }}</h2>
                <table class="table table-border text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status Kelulusan</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <th>{{ $item->dataDiri->nama }}</th>
                                <th>{{ $item->verifikasi == 0 ? 'Belum verifikasi' : 'Sudah Verifikasi' }}</th>
                                <th>{{ $item->dataDiri->nilai_ijazah == 0 ? '-' : $item->dataDiri->nilai_ijazah }}</th>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <h4>Data Kosong</h4>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>
