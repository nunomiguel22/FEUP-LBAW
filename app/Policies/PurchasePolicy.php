<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Purchase;
use App\Models\Game;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PurchasePolicy
{
    use HandlesAuthorization;

    public function list(User $user)
    {
        // Any autheticated user can list his own keys
        return Auth::check();
    }
}
