<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        date_default_timezone_set('Asia/Jakarta'); // Paksa PHP menggunakan Asia/Jakarta
        Carbon::setLocale('id'); // Set lokal Indonesia
        Config::set('app.timezone', 'Asia/Jakarta'); // Paksa Laravel pakai timezone ini
        Date::setTestNow(Carbon::now());
    }
}
