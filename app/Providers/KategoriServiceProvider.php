<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class KategoriServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('kategori-service', function ($app) {
            return new \App\Service\KategoriService();
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
