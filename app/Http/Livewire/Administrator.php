<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Administrator extends Component
{
    public $datauser = [];
    public $pencarian = '';
    public $adminadd = [
        'nama' => '',
        'username' => '',
    ];
    public $adminview = [
        'id' => 0,
        'nama' => '',
        'username' => '',
    ];
    public $customMessages = [
        'required' => 'Bagian :attribute harus diisi!',
        'integer' => 'Bagian :attribute harus diisi dengan angka atau digit!'
    ];

    public function render()
    {
        if ($this->pencarian == '') {
            $this->datauser = User::where('level', '1')->get();
        } else {
            $this->datauser = User::where('level', '1')
                ->whereRaw('(username LIKE "%' . $this->pencarian . '%" or name LIKE "%' . $this->pencarian . '%")')
                ->get();
        }
        return view('livewire.administrator')
            ->extends('layouts.livewire');
    }

    public function mount()
    {
        if (Auth::user()->level == '1' || Auth::user()->level == '0') {
            $this->redirecting('dashboard');
        }
    }

    public function redirecting($route, $data = [])
    {
        if (count($data) == 0) {
            return redirect(route($route));
        } else {
            return redirect(route($route, $data));
        }
    }

    public function store()
    {
        $validasi = Validator::make(
            $this->adminadd,
            [
                'nama'   => 'required',
                'username'   => 'required',
            ],
            $this->customMessages
        );

        if ($validasi->fails()) {
            $this->alert('Data gagal ditambah. Silahkan ulangi!', 'danger', 1, 'alertremove');
        } else {
            User::insert([
                'name' => $this->adminadd['nama'],
                'username' => $this->adminadd['username'],
                'password' => Hash::make('12345678'),
                'level' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $this->eraseText();
            $this->alert('Data berhasil ditambah.', 'success', 1, 'alertremove');
        }
    }

    public function update($id)
    {
        $validasi = Validator::make(
            $this->adminview,
            [
                'nama'   => 'required',
                'username'   => 'required',
            ],
            $this->customMessages
        );

        if ($validasi->fails()) {
            $this->alert('Data gagal diperbarui. Silahkan ulangi!', 'danger', 1, 'alertremove');
        } else {
            User::where('id', $id)->update([
                'name' => $this->adminview['nama'],
                'username' => $this->adminview['username']
            ]);
            $this->eraseText();
            $this->alert('Data berhasil diperbarui.', 'success', 1, 'alertremove');
        }
    }

    public function viewData($id)
    {
        $data = User::where('id', $id)->firstOrFail();
        $this->adminview = [
            'id' => $id,
            'nama' => $data['name'],
            'username' => $data['username'],
        ];
        $this->emit('showmodal', 'editadmin');
    }

    public function eraseText()
    {
        $this->adminadd = [
            'nama' => '',
            'username' => '',
        ];
        $this->adminview = [
            'id' => 0,
            'nama' => '',
            'username' => '',
        ];
    }

    public function alert($message, $color, $alertpage = [0, 1], $idname = '')
    {
        session()->flash('message', $message);
        session()->flash('color', $color);
        if ($alertpage == 1) {
            $this->emit($idname);
        }
    }

    public function randomString($len = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
        $randstring = '';
        for ($i = 0; $i < $len; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }
}
