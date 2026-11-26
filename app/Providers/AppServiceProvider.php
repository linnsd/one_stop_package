<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        URL::forceScheme('https');

        // Existing oauth_clients rows use auto-increment integer IDs (pre-Passport 13).
        Passport::$clientUuids = false;

        // Password grant was enabled by default before Passport 12; keep it available.
        Passport::enablePasswordGrant();
    }
}
