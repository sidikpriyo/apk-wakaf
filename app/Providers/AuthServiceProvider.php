<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define User Role
        Gate::define('pengelola', function ($user) {
            return $user->role == 'pengelola';
        });

        Gate::define('lembaga', function ($user) {
            return $user->role == 'lembaga';
        });

        Gate::define('donatur', function ($user) {
            return $user->role == 'donatur';
        });
    }
}
