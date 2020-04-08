<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use View;

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
        //
        View::share('Name', "tikken");
        View::composer('*', function($view) {
            $view->with('userData', Auth::user());
        });
    }
}
