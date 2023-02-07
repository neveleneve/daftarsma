<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $tahunajaran;
    public function render()
    {
        $this->tahunajaran = $this->tahunajaran();
        return view('livewire.dashboard')
            ->extends('layouts.livewire');
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
