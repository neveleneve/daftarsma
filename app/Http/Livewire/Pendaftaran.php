<?php

namespace App\Http\Livewire;

use App\Models\DataDiri;
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
        'nama' => '',
        'jenis_kelamin' => '',
        'nisn' => '',
        'nik' => '',
        'tempat_lahir' => '',
        'tanggal_lahir' => '',
        'no_reg_akta_kelahiran' => '',
        'agama' => '',
        'kebutuhan_khusus' => '',
        'tinggal_dengan_ortu' => '',
    ];

    public $datawali = [];

    public $dataayah = [];

    public $dataibu = [];

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
        if (count($datadiris) > 0) {
            $this->datadiri = [
                'nama' => $datadiris[0]['nama'],
                'jenis_kelamin' => $datadiris[0]['jenis_kelamin'],
                'nisn' => $datadiris[0]['nisn'],
                'nik' => $datadiris[0]['nik'],
                'tempat_lahir' => $datadiris[0]['tempat_lahir'],
                'tanggal_lahir' => $datadiris[0]['tanggal_lahir'],
                'no_reg_akta_kelahiran' => $datadiris[0]['no_reg_akta_kelahiran'],
                'agama' => $datadiris[0]['agama'],
                'kebutuhan_khusus' => $datadiris[0]['kebutuhan_khusus'],
                'tinggal_dengan_ortu' => $datadiris[0]['tinggal_bersama_ortu'],
            ];
        } else {
            $this->datadiri = [
                'nama' => '',
                'jenis_kelamin' => '',
                'nisn' => '',
                'nik' => '',
                'tempat_lahir' => '',
                'tanggal_lahir' => '',
                'no_reg_akta_kelahiran' => '',
                'agama' => '',
                'kebutuhan_khusus' => '',
                'tinggal_dengan_ortu' => '',
            ];
        }

        $datawalis = DataWali::where('id_user_daftar', $this->datadaftar['id_user_daftar'])->get();
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
