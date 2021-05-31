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
        //to make a review the user must be logged in, must have bought the game and not have made a review of the game
        //$game->user_has_key(Auth::user()->id) &&
        return Auth::check() && !$user->reviews->where('user_id', $user->id)->first());
    }


    public function edit(User $user, Review $review)
    {
        //to edit or delete review the user must be logged in and must have bought the game and be the one who made the review
        return Auth::check() && $review->user_id === $user->id;
        // TODO: missing game validation
    }
}