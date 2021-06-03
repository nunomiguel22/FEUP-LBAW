<?php

namespace App\Policies;

use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function modify(User $user)
    {
        // To Add, Edit or Delete User info the user must be logged in
        return Auth::check();
    }
}
