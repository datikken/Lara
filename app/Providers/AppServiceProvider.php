<?php

namespace App\Providers;

use App\Product;
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
        $products = Product::all();
        View::share('products', $products);
        View::composer('*', function($view) {
            $view->with('userData', Auth::user());
        });
    }
}
