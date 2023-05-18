<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Laporan extends Component
{
    public $tahunajaran = [];

    public function render()
    {
        return view('livewire.laporan')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        $this->tahunajaran = $this->tahunajaran();
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
