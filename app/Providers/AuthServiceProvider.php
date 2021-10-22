<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\User;
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

        Gate::define('role', function($user, ...$role){
            return in_array($user->role, $role);
        });

        Gate::define('gate_admin_access' , function(User $user) {

            return $user->user_type === "user";

        });

        //
    }
}
