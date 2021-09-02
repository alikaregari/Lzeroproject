<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function edit(User $user,$currentUser): bool
    {
       if ($user->is_superuser==1):
           return true;
       else:
           return $user->id==$currentUser->id;
       endif;
    }
}
