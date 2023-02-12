<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected function hasAdminRole()
    {
        return Role::where('name', 'admin')->first();
    }
    protected function hasAuthorRole()
    {
        return Role::where('name', 'author')->first();
    }
    protected function hasEscortRole()
    {
        return Role::where('name', 'escort')->first();
    }
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

         Gate::define('gest-users', function (User $user) {
            return $user->role_id == $this->hasAdminRole()->id || $user->role_id == $this->hasAuthorRole()->id;
        });

        Gate::define('deep-gest-users', function (User $user) {
            return $user->role_id == $this->hasAdminRole()->id;
        });

        Gate::define('escort-user', function (User $user) {
            return $user->role_id == $this->hasEscortRole()->id;
        });
    }
}
