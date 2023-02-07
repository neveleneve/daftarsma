<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('level', function ($level) {
            if ($level == 'superadmin') {
                return Auth::check() && auth()->user()->level == 2;
            } elseif ($level == 'admin') {
                return Auth::check() && auth()->user()->level == 1;
            } elseif ($level == 'casis') {
                return Auth::check() && auth()->user()->level == 0;
            } elseif ($level == 'alladmin') {
                return Auth::check() && (auth()->user()->level == 2 || auth()->user()->level == 1);
            }
        });
    }
}
