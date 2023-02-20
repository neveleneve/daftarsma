<?php

namespace Database\Seeders;

use App\Models\User;
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
    }
}