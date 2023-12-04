<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\SettingsPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'settings' => SettingsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('settings', function (User $user){
            return $user->isAdmin
            ? Response::allow()
            : Response::deny('You must be an administrator');
        });

        Gate::define('canAccess', function (User $user, $role) {
            return $user->role === $role;
        });

        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('isSupervisor', function (User $user) {
            return $user->role === 'supervisor';
        });

        Gate::define('isSeller', function (User $user) {
            return $user->role === 'seller';
        });

    }
}
