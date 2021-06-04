<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

use App\Models\Purchase;
use App\Models\Game;
use App\Models\User;

class WishlistController extends Controller
{
    // POST /products/{id}/wishlist
    public function addGame($id)
    {
        $game = null;

        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $this->authorize('addToWhishlist', $game);

        Auth::user()->wishlist_items()->attach($id);
        return back();
    }

    // DELETE /products/{id}/wishlist
    public function removeGame($id)
    {

        $game = null;

        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $this->authorize('removeFromWhishlist', $game);
        
        Auth::user()->wishlist_items()->detach($id);
        return back();
    }

    // DELETE /user/wishlist
    public function removeAll()
    {
        Auth::user()->wishlist_items()->detach();
        return back();
    }
}
