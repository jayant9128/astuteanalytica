<?php

namespace App\Providers;

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
        define('SITE_URL', 'Astute.');
        define('META_DESCIPTION', 'Astute.');
        define('META_KEYWORD', 'Astute.');

    }
}
