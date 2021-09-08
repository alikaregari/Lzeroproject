<?php

namespace App\Helpers\Login;

use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('login', fn() => new LoginService());
    }
}
