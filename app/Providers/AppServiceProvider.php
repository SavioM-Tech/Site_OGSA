<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
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
        // En production, tous les liens utilisent l'adresse officielle (APP_URL) en HTTPS.
        // Indispensable sur un hébergement où le site est servi via le .htaccess racine (sans « /public » dans les URL).
        if ($this->app->environment('production')) {
            URL::forceRootUrl(config('app.url'));
            if (str_starts_with(config('app.url'), 'https://')) {
                URL::forceScheme('https');
            }
        }

        // Limite les envois de formulaires (contact, newsletter) pour freiner le spam.
        RateLimiter::for('contact', function (Request $request) {
            return Limit::perHour(10)->by($request->ip());
        });
    }
}
