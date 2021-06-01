<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Game;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReviewPolicy
{
    use HandlesAuthorization;

    public function add(User $user)
    {
        //To make a review the user must be logged in and not have made a review of the game already
        return Auth::check() && !$user->reviews->where('user_id', $user->id)->first();
    }


    public function edit(User $user, Review $review)
    {
        //To edit or delete review the user must be logged in and be the one who made the review
        return Auth::check() && $review->user_id === $user->id;
    }
}
