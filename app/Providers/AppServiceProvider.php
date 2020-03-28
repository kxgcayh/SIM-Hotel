<?php

namespace App\Providers;

use App\View\Components\BcItem;
use App\View\Components\BreadCrumb;
use App\View\Components\CardContent;
use App\View\Components\BcItemActive;
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
        // Components
        Blade::component('card-content', CardContent::class);
        Blade::component('bread-crumb', BreadCrumb::class);
        Blade::component('bc-item', BcItem::class);
        Blade::component('bc-item-active', BcItemActive::class);

        // Includes
        Blade::include('includes.footer', 'footer');
        Blade::include('includes.header', 'header');
        Blade::include('includes.left-sidebar', 'leftSidebar');
        Blade::include('includes.preloader', 'preloader');
        Blade::include('includes.right-sidebar', 'rightSidebar');
        Blade::include('includes.service-panel', 'servicePanel');
        Blade::include('includes.footer-script', 'footerScript');
        Blade::include('includes.header-script', 'headerScript');
    }
}
