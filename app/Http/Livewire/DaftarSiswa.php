<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class DaftarSiswa extends Component
{
    public $datacasis = [];
    public $pencarian;
    public $iddaftar;
    public $casisadd = [
        'id_daftar' => '',
        'nama' => '',
        'kelamin' => '',
        'nik' => '',
        'nisn' => '',
    ];
    public $casisview = [
        'id' => 0,
        'nama' => '',
        'nik' => '',
        'nisn' => '',
    ];
    public $customMessages = [
        'required' => 'Bagian :attribute harus diisi!',
        'integer' => 'Bagian :attribute harus diisi dengan angka atau digit!',
        'max' => 'Bagian :attribute harus diisi dengan angka atau digit maksimal :value!',
        'min' => 'Bagian :attribute harus diisi dengan angka atau digit minimal :value!',
    ];

    public function render()
    {
        return view('livewire.daftar-siswa')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        $this->iddaftar = $this->randomString();
        $this->casisadd['id_daftar'] = $this->iddaftar;
    }

    public function store()
    {
        $validasi = Validator::make(
            $this->casisadd,
            [
                'nama' => 'required',
                'nik' => ['required', 'integer', 'max:16', 'min:16'],
                'nisn' => 'required',
            ],
            $this->customMessages
        );

        if ($validasi->fails()) {
            $this->alert('Data gagal ditambah. Silahkan ulangi!', 'danger', 1, 'alertremove');
        } else {
            // User::insert([
            //     'name' => $this->adminadd['nama'],
            //     'username' => $this->adminadd['username'],
            //     'password' => Hash::make('12345678'),
            //     'level' => '1',
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            // ]);
            // $this->eraseText();
            // $this->alert('Data berhasil ditambah.', 'success', 1, 'alertremove');
        }
        $this->casisadd['id_daftar'] = $this->randomString();
    }
    // public function store()
    // {
    // }
    // public function store()
    // {
    // }


    public function eraseText()
    {
        $this->casisadd = [
            'id_daftar' => $this->iddaftar,
            'nama' => '',
            'kelamin' => '',
            'nik' => '',
            'nisn' => '',
        ];
        // $this->casisview = [
        //     'id' => 0,
        //     'nama' => '',
        //     'nik' => '',
        //     'nisn' => '',
        // ];
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
}
