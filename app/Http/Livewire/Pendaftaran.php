<?php

namespace App\Http\Livewire;

use App\Models\DataAyah;
use App\Models\DataDiri;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\UserDaftar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pendaftaran extends Component
{
    public $datadaftar = [
        'id_user_daftar' => 0,
        'id_daftar' => '',
        'tahun_ajaran' => '',
    ];

    public $datadiri = [
        'id_user_daftar' => 0,
        'nama' => '',
        'jenis_kelamin' => '',
        'nisn' => '',
        'nik' => '',
        'tempat_lahir' => '',
        'tanggal_lahir' => '',
        'no_reg_akta_kelahiran' => '',
        'agama' => '',
        'kebutuhan_khusus' => '',
        'tinggal_bersama_ortu' => '',
        'alamat' => '',
    ];

    public $dataayah = [
        'id_user_daftar' => 0,
        'nama' => '',
        'nik' => '',
        'pendidikan' => '',
        'pekerjaan' => '',
        'penghasilan' => '',
        'alamat' => '',
    ];

    public $dataibu = [
        'id_user_daftar' => 0,
        'nama' => '',
        'nik' => '',
        'pendidikan' => '',
        'pekerjaan' => '',
        'penghasilan' => '',
        'alamat' => '',
    ];

    public $datawali = [
        'id_user_daftar' => 0,
        'nama' => '',
        'nik' => '',
        'pendidikan' => '',
        'pekerjaan' => '',
        'penghasilan' => '',
    ];

    public $tahunajar = [];

    public function render()
    {
        return view('livewire.pendaftaran')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        $this->tahunajar = $this->tahunajaran();

        $datadaftars = UserDaftar::where('username', Auth::user()->username)->get();
        $this->datadaftar = [
            'id_user_daftar' => $datadaftars[0]['id'],
            'id_daftar' => $datadaftars[0]['id_daftar'],
            'tahun_ajaran' => $datadaftars[0]['tahun_ajaran'],
        ];

        $datadiris = DataDiri::where('id_user_daftar', $this->datadaftar['id_user_daftar'])->get();
        $this->datadiri = [
            'id_user_daftar' => $datadiris[0]['id_user_daftar'],
            'nama' => $datadiris[0]['nama'],
            'jenis_kelamin' => $datadiris[0]['jenis_kelamin'],
            'nisn' => $datadiris[0]['nisn'],
            'nik' => $datadiris[0]['nik'],
            'tempat_lahir' => $datadiris[0]['tempat_lahir'],
            'tanggal_lahir' => $datadiris[0]['tanggal_lahir'],
            'no_reg_akta_kelahiran' => $datadiris[0]['no_reg_akta_kelahiran'],
            'agama' => $datadiris[0]['agama'],
            'kebutuhan_khusus' => $datadiris[0]['kebutuhan_khusus'],
            'tinggal_bersama_ortu' => $datadiris[0]['tinggal_bersama_ortu'],
            'alamat' => $datadiris[0]['alamat'],
        ];

        $dataayahs = DataAyah::where('id_user_daftar', $this->datadaftar['id_user_daftar'])->get();
        $this->dataayah = [
            'id_user_daftar' => $dataayahs[0]['id_user_daftar'],
            'nama' => $dataayahs[0]['nama'],
            'nik' => $dataayahs[0]['nik'],
            'pendidikan' => $dataayahs[0]['pendidikan'],
            'pekerjaan' => $dataayahs[0]['pekerjaan'],
            'penghasilan' => $dataayahs[0]['penghasilan'],
            'kebutuhan_khusus' => $dataayahs[0]['kebutuhan_khusus'],
            'alamat' => $dataayahs[0]['alamat'],
        ];

        $dataibus = DataIbu::where('id_user_daftar', $this->datadaftar['id_user_daftar'])->get();
        $this->dataibu = [
            'id_user_daftar' => $dataibus[0]['id_user_daftar'],
            'nama' => $dataibus[0]['nama'],
            'nik' => $dataibus[0]['nik'],
            'pendidikan' => $dataibus[0]['pendidikan'],
            'pekerjaan' => $dataibus[0]['pekerjaan'],
            'penghasilan' => $dataibus[0]['penghasilan'],
            'kebutuhan_khusus' => $dataibus[0]['kebutuhan_khusus'],
            'alamat' => $dataibus[0]['alamat'],
        ];

        $datawalis = DataWali::where('id_user_daftar', $this->datadaftar['id_user_daftar'])->get();
        $this->datawali = [
            'id_user_daftar' => $datawalis[0]['id_user_daftar'],
            'nama' => $datawalis[0]['nama'],
            'nik' => $datawalis[0]['nik'],
            'pendidikan' => $datawalis[0]['pendidikan'],
            'pekerjaan' => $datawalis[0]['pekerjaan'],
            'penghasilan' => $datawalis[0]['penghasilan'],
            'kebutuhan_khusus' => $datawalis[0]['kebutuhan_khusus'],
            'alamat' => $datawalis[0]['alamat'],
        ];
    }

    public function tahunajaran()
    {
        $tahunajar = [];
        if (date('n') > 5) {
            $thnow = date('Y') - 3;
        } else {
            $thnow = date('Y') - 4;
        }

        for ($i = 0; $i < 5; $i++) {
            $th1 = $thnow + $i;
            $th2 = ($thnow + 1) + $i;
            $tahunajar[$i] = $th1 . '-' . $th2;
        }
        return $tahunajar;
    }
}
