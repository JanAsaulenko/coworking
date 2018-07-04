<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CalculateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Calculator', function (){
            return new \App\Lib\Calculator();
        });
    }
}
