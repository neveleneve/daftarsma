<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DaftarSiswaView extends Component
{
    public function render()
    {
        return view('livewire.daftar-siswa-view')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        # code...
    }
}
