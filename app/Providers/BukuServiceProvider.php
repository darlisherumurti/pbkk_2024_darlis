<?php

namespace App\Providers;

use App\Service\BukuService;
use Illuminate\Support\ServiceProvider;

class BukuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('buku-service', function ($app) {
            return new BukuService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // \Illuminate\Support\Facades\Facade::class_alias('buku-service', 'BukuService');
    }
}
