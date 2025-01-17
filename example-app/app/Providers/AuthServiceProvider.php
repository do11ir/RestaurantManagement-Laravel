<?php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // تعریف Gate برای نقش admin
        Gate::define('is-admin', function ($user) {
            return $user->RoleAdmin === 'admin';
        });

        // تعریف Gate برای نقش master
        Gate::define('is-master', function ($user) {
            return $user->RoleAdmin === 'master';
        });

        // تعریف Gate برای کاربران عادی (خالی)
        Gate::define('is-user', function ($user) {
            return $user->RoleAdmin === null || $user->RoleAdmin === '';
        });
    }
}
