<?php

namespace App\Providers;

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
        Blade::include('includes.footer', 'footer');
        Blade::include('includes.header', 'header');
        Blade::include('includes.leftSidebar', 'leftSidebar');
        Blade::include('includes.preloader', 'preloader');
        Blade::include('includes.rightSidebar', 'rightSidebar');
        Blade::include('includes.servicePanel', 'servicePanel');
    }
}
