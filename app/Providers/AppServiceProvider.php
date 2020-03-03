<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;

/*
 * Defaut display of Carbon dates can be changed using the method
 * This method have to be called BEFORE outputing any date to string
 */
// \Carbon\Carbon::setToStringFormat('d/m/Y à H:i');

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
        // setlocale(LC_TIME, config('app.locale'));
        setlocale(LC_TIME, 'fr_FR', 'fr', 'FR', 'French', 'fr_FR.UTF-8');
        Carbon::setLocale('fr'); // This is only needed to use ->diffForHumans()

    }
}
