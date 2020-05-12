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
        Blade::component('components.alert', 'alert');
        Blade::component('components.topButton', 'btn');
        Blade::component('components.form', 'myform');
        Blade::component('components.clearbtn', 'btnclear');
        Blade::component('components.table', 'mytable');
        Blade::component('components.modal', 'modal');
        Blade::component('components.panel', 'mypanel');
    }
}
