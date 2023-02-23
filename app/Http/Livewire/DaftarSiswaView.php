<?php

namespace App\Http\Livewire;

use App\Models\DataAyah;
use App\Models\DataDiri;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\UserDaftar;
use Livewire\Component;

class DaftarSiswaView extends Component
{
    public $ids = '';
    public $datadaftar = [];
    public $datadiri = [];
    public $dataayah = [];
    public $dataibu = [];
    public $datawali = [];
    public function render()
    {
        $this->dataCheck($this->ids);
        return view('livewire.daftar-siswa-view')
            ->extends('layouts.livewire');
    }

    public function mount($id)
    {
        $this->ids = $id;
        $this->datadaftar = UserDaftar::where('id_daftar', $id)
            ->firstOrFail();
        $this->datadiri = DataDiri::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->dataayah = DataAyah::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->dataibu = DataIbu::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
        $this->datawali = DataWali::where('id_user_daftar', $this->datadaftar['id'])
            ->firstOrFail();
    }

    public function dataCheck($id)
    {
        $data = UserDaftar::where('id_daftar', $id)->count();
        if ($data == 0) {
            return redirect(route('siswa'));
        }
    }

    public function arrayCheck($arr)
    {
        $jumlah = 0;
        $text = "";
        foreach ($arr as $keys => $value) {
            $text .= $value . ' -';
        }
        return $text;
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
}
