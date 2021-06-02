<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Address;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AddressPolicy
{
    use HandlesAuthorization;

    public function modify(User $user)
    {
        // To Add, Edit or Delete Addresses the user must be logged in
        return Auth::check();
    }

    
}
