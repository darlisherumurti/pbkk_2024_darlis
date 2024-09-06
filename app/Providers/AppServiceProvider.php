<?php

namespace App\Providers;

use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

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
        //
        Paginator::useBootstrapFour();
        Gate::define('view-pinjaman', function (User $user, Pinjaman $pinjaman) {
            if ($user->hasRole('admin|petugas')) {
                return true;
            }
            return $user->id === $pinjaman->user_id;
        });
    }
}
