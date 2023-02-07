<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', App\Http\Livewire\Dashboard::class)
        ->name('dashboard');
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('administrator', App\Http\Livewire\Administrator::class)
        ->name('administrator');
});

Route::middleware(['auth', 'alladmin'])->group(function () {
    Route::get('daftar-siswa', App\Http\Livewire\DaftarSiswa::class)
        ->name('siswa');

    Route::get('laporan', App\Http\Livewire\Laporan::class)
        ->name('laporan');
});

Route::middleware(['auth', 'casis'])->group(function () {
    # next route
});
