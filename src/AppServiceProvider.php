<?php

namespace VioletaskyaFrontend;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /**
         * Register local routes.
         */
        include __DIR__.'/routes.php';

        /**
         * Register views.
         */
        $this->loadViewsFrom(__DIR__ . '/Views', 'violetaskya-frontend');
    }

    public function register()
    {

    }
}