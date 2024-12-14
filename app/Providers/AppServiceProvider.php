<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Middleware\RoleMiddleware;
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
        // Daftarkan middleware global
        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);

        Gate::define('isAdminOrEngineer', function(User $user) {
            return $user->level == 'admin' xor $user->level == 'engineer';
        });

        Gate::define('isAdmin', function(User $user) {
            return $user->level == 'admin';
        });

        Gate::define('isEngineer', function(User $user) {
            return $user->level == 'engineer';
        });

        Gate::define('isBendahara', function(User $user) {
            return $user->level == 'bendahara';
        });

        Gate::define('isKasir', function(User $user) {
            return $user->level == 'kasir';
        });
    }
}
