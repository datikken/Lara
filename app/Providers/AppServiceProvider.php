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

        VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = $this->verificationUrl($notifiable);

            // Return your mail here...
            return (new MailMessage)
                ->subject('Verify your email address')
                ->markdown('emails.verify', ['url' => $verifyUrl]);
        });

        $information = Information::all();
        View::share('information', $information);

        View::composer('*', function($view) {
            $view->with('userData', Auth::user());
        });
    }
}
