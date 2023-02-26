<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DataAyah;
use App\Models\DataDiri;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserDaftar;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $userdaftar = UserDaftar::create([
            'username' => $data['username'],
            'id_daftar' => $this->randomString(),
            'tahun_ajaran' => $this->tahunajaran(),
            'verifikasi' => 0,
        ]);
        DataDiri::insert([
            'id_user_daftar' => $userdaftar->id,
            'nama' => $data['name']
        ]);
        DataAyah::insert([
            'id_user_daftar' => $userdaftar->id
        ]);
        DataIbu::insert([
            'id_user_daftar' => $userdaftar->id
        ]);
        DataWali::insert([
            'id_user_daftar' => $userdaftar->id
        ]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'level' => '0',
        ]);
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

    public function tahunajaran()
    {
        if (date('n') > 5) {
            return (date('Y') + 1) . '-' . (date('Y') + 2);
        } else {
            return date('Y') . '-' . (date('Y') + 1);
        }
    }
}
