<?php

namespace Database\Seeders;

use App\Models\DataAyah;
use App\Models\DataDiri;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\User;
use App\Models\UserDaftar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Super Administrator',
                'email' => 'superadministrator@gmail.com',
                'username' => 'superadministrator',
                'password' => Hash::make('12345678'),
                'level' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Administrator',
                'email' => 'administrator@gmail.com',
                'username' => 'administrator',
                'password' => Hash::make('12345678'),
                'level' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ahmad Andian',
                'email' => 'madandian@gmail.com',
                'username' => 'madandian',
                'password' => Hash::make('12345678'),
                'level' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        $userdaftar = UserDaftar::create([
            'username' => 'madandian',
            'id_daftar' => $this->randomString(),
            'tahun_ajaran' => $this->tahunajaran(),
            'verifikasi' => '0'
        ]);
        DataDiri::insert([
            'id_user_daftar' => $userdaftar->id,
            'nama' => 'Ahmad Andian',
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
