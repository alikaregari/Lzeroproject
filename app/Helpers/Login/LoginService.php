<?php

namespace app\Helpers\Login;
class LoginService
{
    public function UserLogin(): bool
    {
        if (auth()->check()):
            return true;
        else:
            return false;
        endif;
    }
}
