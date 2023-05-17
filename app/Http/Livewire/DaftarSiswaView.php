<?php

namespace App\Http\Livewire;

use App\Models\DataAyah;
use App\Models\DataDiri;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\UserDaftar;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class DaftarSiswaView extends Component
{
    public $ids = '';
    public $ijazah = [
        'exist' => false
    ];
    public $pasfoto = [
        'exist' => false
    ];
    public $datadaftar = [
        'id' => 0,
        'id_daftar' => '',
        'tahun_ajaran' => '',
        'verifikasi' => '',
    ];
    public $datadiri = [
        'nama' => '',
        'kontak' => '',
        'jenis_kelamin' => '',
        'nisn' => '',
        'nik' => '',
        'tempat_lahir' => '',
        'tanggal_lahir' => '',
        'agama' => '',
        'kebutuhan_khusus' => '',
        'tinggal_bersama_ortu' => '',
        'alamat' => '',
        'nilai_ijazah' => '',
    ];
    public $dataayah = [
        'nama' => '',
        'nik' => '',
        'kontak' => '',
        'pendidikan' => '',
        'pekerjaan' => '',
        'penghasilan' => '',
        'alamat' => '',
    ];
    public $dataibu = [
        'nama' => '',
        'nik' => '',
        'kontak' => '',
        'pendidikan' => '',
        'pekerjaan' => '',
        'penghasilan' => '',
        'alamat' => '',
    ];
    public $datawali = [
        'nama' => '',
        'nik' => '',
        'kontak' => '',
        'pendidikan' => '',
        'pekerjaan' => '',
        'penghasilan' => '',
    ];

    public function render()
    {
        return view('livewire.daftar-siswa-view')
            ->extends('layouts.livewire');
    }

    public function mount($id)
    {
        $this->ids = $id;

        $datadaftar = UserDaftar::where('id_daftar', $id)
            ->firstOrFail();
        $this->datadaftar = [
            'id' => $datadaftar['id'],
            'id_daftar' => $datadaftar['id_daftar'],
            'tahun_ajaran' => $datadaftar['tahun_ajaran'],
            'verifikasi' => $datadaftar['verifikasi'],
        ];

        $ijazahdir = public_path("storage/images/ijazah/" . $this->datadaftar['id_daftar'] . ".jpg");
        if (!File::exists($ijazahdir)) {
            $this->ijazah = [
                'exist' => false,
            ];
        } else {
            $this->ijazah = [
                'exist' => true,
            ];
        }

        $pasfotodir = public_path("storage/images/pas foto/" . $this->datadaftar['id_daftar'] . ".jpg");
        if (!File::exists($pasfotodir)) {
            $this->pasfoto = [
                'exist' => false,
            ];
        } else {
            $this->pasfoto = [
                'exist' => true,
            ];
        }

        $datadiri = DataDiri::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->datadiri = [
            'nama' => $datadiri['nama'],
            'kontak' => $datadiri['kontak'],
            'jenis_kelamin' => $datadiri['jenis_kelamin'],
            'nisn' => $datadiri['nisn'],
            'nik' => $datadiri['nik'],
            'tempat_lahir' => $datadiri['tempat_lahir'],
            'tanggal_lahir' => $datadiri['tanggal_lahir'],
            'agama' => $datadiri['agama'],
            'kebutuhan_khusus' => $datadiri['kebutuhan_khusus'],
            'tinggal_bersama_ortu' => $datadiri['tinggal_bersama_ortu'],
            'alamat' => $datadiri['alamat'],
            'nilai_ijazah' => $datadiri['nilai_ijazah'],
        ];

        $dataayah = DataAyah::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->dataayah = [
            'nama' => $dataayah['nama'],
            'nik' => $dataayah['nik'],
            'kontak' => $dataayah['kontak'],
            'pendidikan' => $dataayah['pendidikan'],
            'pekerjaan' => $dataayah['pekerjaan'],
            'penghasilan' => $dataayah['penghasilan'],
            'alamat' => $dataayah['alamat'],
        ];

        $dataibu = DataIbu::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->dataibu = [
            'nama' => $dataibu['nama'],
            'nik' => $dataibu['nik'],
            'kontak' => $dataibu['kontak'],
            'pendidikan' => $dataibu['pendidikan'],
            'pekerjaan' => $dataibu['pekerjaan'],
            'penghasilan' => $dataibu['penghasilan'],
            'alamat' => $dataibu['alamat'],
        ];

        if ($this->datadiri['tinggal_bersama_ortu'] == 'tidak') {
            $datawali = DataWali::where('id_user_daftar', $this->datadaftar['id'])
                ->firstOrFail();
            $this->datawali = [
                'nama' => $datawali['nama'],
                'nik' => $datawali['nik'],
                'kontak' => $datawali['kontak'],
                'pendidikan' => $datawali['pendidikan'],
                'pekerjaan' => $datawali['pekerjaan'],
                'penghasilan' => $datawali['penghasilan'],
                'alamat' => $datawali['alamat'],
            ];
        }
    }

    public function penghasilan($code)
    {
        switch ($code) {
            case 'tidak ada':
                return 'Tidak Ada Penghasilan';
                break;
            case '<500k':
                return 'Dibawah Rp 500.000';
                break;
            case '500k-1.5jt':
                return 'Rp 500.000 - Rp 1.499.000';
                break;
            case '1.5jt-3jt':
                return 'Rp 1.500.000 - Rp 3.000.000';
                break;
            case '>3jt':
                return 'Diatas Rp 3.000.000';
                break;
            default:
                return '';
                break;
        }
    }

    public function pendidikan($code)
    {
        switch ($code) {
            case 'tidak sekolah':
                return 'Tidak Pernah Sekolah';
                break;
            case 'sd':
                return 'SD';
                break;
            case 'smp':
                return 'SMP';
                break;
            case 'sma':
                return 'SMA';
                break;
            case 'd1':
                return 'D1';
                break;
            case 'd3':
                return 'D3';
                break;
            case 's1':
                return 'S1';
                break;
            case 's2':
                return 'S2';
                break;
            case 's3':
                return 'S3';
                break;
            default:
                return '';
                break;
        }
    }

    public function ubahTanggal($tanggal)
    {
        $tgl = date('d', strtotime($tanggal));
        $bln = date('m', strtotime($tanggal));
        $thn = date('Y', strtotime($tanggal));
        $namabulan = '';
        switch ($bln) {
            case '1':
                $namabulan = 'Januari';
                break;
            case '2':
                $namabulan = 'Februari';
                break;
            case '3':
                $namabulan = 'Maret';
                break;
            case '4':
                $namabulan = 'April';
                break;
            case '5':
                $namabulan = 'Mei';
                break;
            case '6':
                $namabulan = 'Juni';
                break;
            case '7':
                $namabulan = 'Juli';
                break;
            case '8':
                $namabulan = 'Agustus';
                break;
            case '9':
                $namabulan = 'September';
                break;
            case '10':
                $namabulan = 'Oktober';
                break;
            case '11':
                $namabulan = 'November';
                break;
            case '12':
                $namabulan = 'Desember';
                break;

            default:
                $namabulan = '';
                break;
        }
        return $tgl . ' ' . $namabulan . ' ' . $thn;
    }

    public function refreshData($id_daftar)
    {
        $datadaftar = UserDaftar::where('id_daftar', $id_daftar)
            ->firstOrFail();
        $this->datadaftar = [
            'id' => $datadaftar['id'],
            'id_daftar' => $datadaftar['id_daftar'],
            'tahun_ajaran' => $datadaftar['tahun_ajaran'],
            'verifikasi' => $datadaftar['verifikasi'],
        ];

        $datadiri = DataDiri::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->datadiri = [
            'nama' => $datadiri['nama'],
            'kontak' => $datadiri['kontak'],
            'jenis_kelamin' => $datadiri['jenis_kelamin'],
            'nisn' => $datadiri['nisn'],
            'nik' => $datadiri['nik'],
            'tempat_lahir' => $datadiri['tempat_lahir'],
            'tanggal_lahir' => $datadiri['tanggal_lahir'],
            'agama' => $datadiri['agama'],
            'kebutuhan_khusus' => $datadiri['kebutuhan_khusus'],
            'tinggal_bersama_ortu' => $datadiri['tinggal_bersama_ortu'],
            'alamat' => $datadiri['alamat'],
            'nilai_ijazah' => $datadiri['nilai_ijazah'],
        ];

        $dataayah = DataAyah::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->dataayah = [
            'nama' => $dataayah['nama'],
            'nik' => $dataayah['nik'],
            'kontak' => $dataayah['kontak'],
            'pendidikan' => $dataayah['pendidikan'],
            'pekerjaan' => $dataayah['pekerjaan'],
            'penghasilan' => $dataayah['penghasilan'],
            'alamat' => $dataayah['alamat'],
        ];

        $dataibu = DataIbu::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->dataibu = [
            'nama' => $dataibu['nama'],
            'nik' => $dataibu['nik'],
            'kontak' => $dataibu['kontak'],
            'pendidikan' => $dataibu['pendidikan'],
            'pekerjaan' => $dataibu['pekerjaan'],
            'penghasilan' => $dataibu['penghasilan'],
            'alamat' => $dataibu['alamat'],
        ];

        $datawali = DataWali::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->datawali = [
            'nama' => $datawali['nama'],
            'nik' => $datawali['nik'],
            'kontak' => $datawali['kontak'],
            'pendidikan' => $datawali['pendidikan'],
            'pekerjaan' => $datawali['pekerjaan'],
            'penghasilan' => $datawali['penghasilan'],
            'alamat' => $datawali['alamat'],
        ];
    }

    public function verifikasi($id, $id_daftar)
    {
        UserDaftar::where('id', $id)->update([
            'verifikasi' => '1'
        ]);
        $this->datadaftar['verifikasi'] = 1;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Berhasil verifikasi data!"
        ]);
    }
}
