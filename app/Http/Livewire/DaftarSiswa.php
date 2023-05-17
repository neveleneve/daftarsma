<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DaftarSiswa extends Component
{
    public $datacasis = [];
    public $datacasisverified = [];
    public $pencarian = '';
    public $tahunajaranselected;
    public $tahunajaran = [];

    public function render()
    {
        if ($this->pencarian == '') {
            $this->datacasis = DB::table('user_daftars')
                ->join('data_diris', 'user_daftars.id', '=', 'data_diris.id_user_daftar')
                ->where([
                    'user_daftars.tahun_ajaran' => $this->tahunajaranselected,
                    'user_daftars.verifikasi' => '0'
                ])
                ->select([
                    'data_diris.nama as nama',
                    'user_daftars.id_daftar',
                    'user_daftars.verifikasi',
                ])
                ->get();
            $this->datacasisverified = DB::table('user_daftars')
                ->join('data_diris', 'user_daftars.id', '=', 'data_diris.id_user_daftar')
                ->where([
                    'user_daftars.tahun_ajaran' => $this->tahunajaranselected,
                    'user_daftars.verifikasi' => '1'
                ])
                ->select([
                    'data_diris.nilai_ijazah',
                    'data_diris.nama as nama',
                    'user_daftars.id_daftar',
                    'user_daftars.verifikasi',
                ])
                ->get();
        } else {
            $this->datacasis = DB::table('user_daftars')
                ->join('data_diris', 'user_daftars.id', '=', 'data_diris.id_user_daftar')
                ->where([
                    'user_daftars.tahun_ajaran' => $this->tahunajaranselected,
                    'user_daftars.verifikasi' => '0'
                ])
                ->whereRaw('(user_daftars.id_daftar LIKE "%' . $this->pencarian . '%" or data_diris.nama LIKE "%' . $this->pencarian . '%")')
                ->select([
                    'data_diris.nama as nama',
                    'user_daftars.id_daftar',
                    'user_daftars.verifikasi',
                ])
                ->get();
            $this->datacasisverified = DB::table('user_daftars')
                ->join('data_diris', 'user_daftars.id', '=', 'data_diris.id_user_daftar')
                ->where([
                    'user_daftars.tahun_ajaran' => $this->tahunajaranselected,
                    'user_daftars.verifikasi' => '1'
                ])
                ->whereRaw('(user_daftars.id_daftar LIKE "%' . $this->pencarian . '%" or data_diris.nama LIKE "%' . $this->pencarian . '%")')
                ->select([
                    'data_diris.nilai_ijazah',
                    'data_diris.nama as nama',
                    'user_daftars.id_daftar',
                    'user_daftars.verifikasi',
                ])
                ->get();
        }
        return view('livewire.daftar-siswa')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        $this->tahunajaran = $this->tahunajaran();
        $this->tahunajaranselected = $this->tahunajaran[0];
    }

    public function randomString($len = 10)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $len; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }

    public function alert($message, $color, $alertpage = [0, 1], $idname = '')
    {
        session()->flash('message', $message);
        session()->flash('color', $color);
        if ($alertpage == 1) {
            $this->emit($idname);
        }
    }

    public function redirecting($route, $data = null)
    {
        if ($data == null) {
            return redirect(route($route));
        } else {
            return redirect(route($route, ['id' => $data]));
        }
    }

    public function tahunajaran()
    {
        $tahunajar = [];
        if (date('n') >= 2) {
            $thnow = date('Y') + 1;
        } else {
            $thnow = date('Y');
        }

        for ($i = 0; $i < 10; $i++) {
            $th1 = ($thnow - 1) - $i;
            $th2 = $thnow - $i;
            $tahunajar[$i] = $th1 . '-' . $th2;
        }
        return $tahunajar;
    }
}
