<?php

namespace InfancyIt\LogRhythm;

use Illuminate\Support\ServiceProvider;

class LogRhythmServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../publish/config/' => app_path('../config'),
            __DIR__ . '/../publish/migrations/' => app_path('../database/migrations'),
        ], 'Farhad-LogRhythm');
//        $this->loadRoutesFrom(__DIR__.'/routes/web.php');


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}