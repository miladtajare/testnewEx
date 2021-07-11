<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
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

        Gate::before(function( $user , $abilities , $params )
        {
            if( ( $user->userType == 'manager' ) || ( $user->userType == 'teacher' ) )
            { return true; }
        });



        Gate::define('show-teacher-manager', function (User $user) {
            return ( $user->userType == 'teacher' ) || ($user->userType == 'manager') ;
        });

        Gate::define('show-teacher', function (User $user) {
            return $user->userType == 'teacher' ;
        });

        Gate::define('show-student', function (User $user) {
            return $user->userType == 'student' ;
        });

        Gate::define('show-manager', function (User $user) {
            return $user->userType == 'manager' ;
        });

        Gate::define('show-guest', function (User $user) {
            return $user->userType == 'guest' ;
        });


    }
}
