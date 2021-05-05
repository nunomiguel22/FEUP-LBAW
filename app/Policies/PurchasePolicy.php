<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Game;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PurchasePolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        // Any user can create a new card
        return Auth::check();
    }
}
