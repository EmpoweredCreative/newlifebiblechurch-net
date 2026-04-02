<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use SendGrid;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (filled(config('services.sendgrid.api_key'))) {
            $this->app->singleton(SendGrid::class, function (): SendGrid {
                return new SendGrid((string) config('services.sendgrid.api_key'));
            });
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        /*
         * Align mail.from with config('services.sendgrid') when Laravel's global From is not explicitly set via MAIL_*.
         * mail.php is loaded before services.php, so this runs after both are merged. MAIL_* still wins when set.
         */
        if (! filled(env('MAIL_FROM_ADDRESS')) && filled(config('services.sendgrid.from_email'))) {
            Config::set('mail.from.address', (string) config('services.sendgrid.from_email'));
        }
        if (! filled(env('MAIL_FROM_NAME')) && filled(config('services.sendgrid.from_name'))) {
            Config::set('mail.from.name', (string) config('services.sendgrid.from_name'));
        }

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
