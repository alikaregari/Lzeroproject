<?php

namespace App\Providers;

use App\Http\Controllers\Admin\UserController;
use App\Models\Permission;
use App\Models\Rule;
use App\Models\User;
use App\Policies\UserPolicy;
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
       //User::class=>UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user){
            if ($user->is_superuser==1):
                return true;
            endif;
        });
        foreach (Permission::all() as  $permission):
            Gate::define($permission->name,function ($currentUser) use ($permission){
                      /*  if ($currentUser->hasPermission($permission)):
                            return $currentUser->id==$user->id;
                        else:
                            return false;
                        endif;*/
                return $currentUser->hasPermission($permission);
            });
        endforeach;
    }
}
