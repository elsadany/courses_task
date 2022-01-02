<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

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
         Schema::defaultStringLength(191);
        Blade::include('backend.partials.success', 'success');
        Blade::include('backend.partials.errors', 'errors');
        Blade::include('backend.partials.deletejs', 'deletejs');
        Blade::include('backend.partials.breadcrumb', 'breadcrumb');
    }
}
