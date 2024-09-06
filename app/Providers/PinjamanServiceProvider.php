<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PinjamanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('pinjaman-service', function ($app) {
            return new \App\Service\PinjamanService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
