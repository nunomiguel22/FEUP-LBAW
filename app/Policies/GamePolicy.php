<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Game;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class GamePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        // Any user can create a new card
        return Auth::user()->is_admin;
    }
}
