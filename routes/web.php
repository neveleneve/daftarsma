<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

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
    Route::get('daftar-siswa/view/bridge/{id}', [App\Http\Controllers\BridgeController::class, 'siswaViewBridge'])
        ->name('siswaviewbridge');
    Route::get('daftar-siswa/view/{id}', App\Http\Livewire\DaftarSiswaView::class)
        ->name('siswaview');

    Route::get('laporan', App\Http\Livewire\Laporan::class)
        ->name('laporan');
});

Route::middleware(['auth', 'casis'])->group(function () {
    Route::get('pendaftaran', App\Http\Livewire\Pendaftaran::class)
        ->name('pendaftaran');
});
