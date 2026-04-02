<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        /*
         * SendGrid: if the API key is set but MAIL_MAILER is still log or array (e.g. copied .env.example),
         * use the sendgrid SMTP mailer so Mail:: actually delivers — same pattern as typical Laravel + Forge sites.
         */
        if (! app()->environment('testing')
            && filled(config('services.sendgrid.api_key'))
            && in_array(config('mail.default'), ['log', 'array'], true)) {
            Config::set('mail.default', 'sendgrid');
        }
    }
}
