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

        .table-border {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table-padding {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .header-align-center {
            text-align: center;
        }

        .last {
            position: absolute;
            bottom: 0px;
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
                    <img src="{{ asset('images/logo.png') }}" height="10%" width="35%"
                        class="align-items-center" />
                </td>
                <td>
                    <h1 class="text-center">SMA Negeri 1 Palmatak</h1>
                    <h6 class="text-center">
                        Jalan M. Yusuf, Kel. Tebang, Kec. Palmatak, Kab. Kepulauan Anambas Prov. Kepulauan Riau
                    </h6>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>

    <h2 class="text-center mb-3">{{ $title }}</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="table-border">No</th>
                <th class="table-border">Nama</th>
                <th class="table-border text-center">Status Kelulusan</th>
                <th class="table-border text-center">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <th class="table-border table-padding">{{ $loop->index + 1 }}</th>
                    <th class="table-border table-padding">{{ $item->dataDiri->nama }}</th>
                    <th class="table-border table-padding text-center">
                        {{ $item->verifikasi == 0 ? 'Belum verifikasi' : 'Sudah Verifikasi' }}
                    </th>
                    <th class="table-border table-padding text-center">
                        {{ $item->dataDiri->nilai_ijazah == 0 ? '-' : $item->dataDiri->nilai_ijazah }}
                    </th>
                </tr>
            @empty
                <tr>
                    <td colspan="4"class="table-border table-padding">
                        <h4 class="text-center">Data Kosong</h4>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="last">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <h6>Kepala Sekolah</h6>
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
