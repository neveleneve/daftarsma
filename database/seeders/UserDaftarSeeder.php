<?php

namespace Database\Seeders;

use App\Models\UserDaftar;
use Illuminate\Database\Seeder;

class UserDaftarSeeder extends Seeder
{
    public function run()
    {
        UserDaftar::insert([
            'username' => 'madandian',
            'id_daftar' => $this->randomString(),
            'tahun_ajaran' => $this->tahunajaran(),
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
