<?php

namespace App\Http\Livewire;

use App\Models\DataDiri;
use Livewire\Component;

class Dashboard extends Component
{
    public $tahunajaran = [];
    public $tahunajaranselected;
    public $pendaftar;
    public $verifikasi;

    public function render()
    {
        $this->pendaftar = DataDiri::where('tahunajaran', $this->tahunajaranselected)->count();
        $this->verifikasi = DataDiri::where('tahunajaran', $this->tahunajaranselected)->where('verifikasi', '1')->count();
        return view('livewire.dashboard')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        $this->tahunajaran = $this->tahunajaran();
        $this->tahunajaranselected = $this->tahunajaran[0];
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
