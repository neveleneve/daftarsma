<?php

namespace App\Http\Livewire;

use App\Models\DataDiri;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class DaftarSiswa extends Component
{
    public $datacasis = [];
    public $pencarian = '';
    public $tahunajaranselected;
    public $tahunajaran = [];

    public function render()
    {
        if ($this->pencarian == '') {
            $this->datacasis = DataDiri::where('tahunajaran', $this->tahunajaranselected)
                ->get();
        } else {
            $this->datacasis = DataDiri::where('tahunajaran', $this->tahunajaranselected)
                ->whereRaw('id_daftar LIKE "%' . $this->pencarian . '%" or nama LIKE "%' . $this->pencarian . '%"')
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
        if (date('n') > 4) {
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
