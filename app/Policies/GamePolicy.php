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

    public function addToCart(User $user, Game $game)
    {
        // Any autheticated user can add a game to the cart if the game has keys available
        // And if the game is not already in the cart
        return Auth::check() && $game->hasAvailableKeys() && !$user->cart_items()->find($game->id);
    }

    public function addToWhishlist(User $user, Game $game)
    {
        // Any autheticated user can add a game to the wishlist and the game is not in the wishlist already
        return Auth::check() && !$user->gameInWishlist($game->id);
    }

    public function removeFromWhishlist(User $user, Game $game)
    {
        // Any autheticated user can remove a game from the wishlist if the game is in the wishlist already
        return Auth::check() && $user->gameInWishlist($game->id);
    }


    public function removeFromCart(User $user, Game $game)
    {
        // A autheticated user can remove a game from the cart if the game is in the cart
        return Auth::check() && $user->cart_items()->find($game->id);
    }

    public function purchased(User $user, Game $game)
    {
        // Verify if the authenticated user has purchased this game
        return Auth::check() && $game->user_has_key($user->id);
    }
}
