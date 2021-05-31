<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Game;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class GamePolicy
{
    use HandlesAuthorization;

    public function modify(User $user)
    {
        // To Add, Edit or Delete games the user must be logged in and be an admin
        return Auth::check() && $user->is_admin;
    }
}
