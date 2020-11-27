<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
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
        // Override the email notification for verifying email
        VerifyEmail::toMailUsing(function ($notifiable,$url){
            $mail = new MailMessage;
            $mail->subject('Welcome!');
            $mail->markdown('emails.verify', ['url' => $url]);
            return $mail;
        });

        View::composer('*', function($view) {
            $view->with('userData', Auth::user());
        });
    }
}
