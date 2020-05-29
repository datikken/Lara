<?php

namespace App\Providers;

use App\Information;
use App\Product;
use Illuminate\Support\ServiceProvider;
use View;
use Auth;

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
        $products = Product::all();
        View::share('products', $products);

        $information = Information::all();
        View::share('information', $information);

        View::composer('*', function($view) {
            $view->with('userData', Auth::user());
        });
    }
}
