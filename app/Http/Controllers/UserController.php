<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\Purchase;

class UserController extends Controller
{
    public function showDefault()
    {
        return $this->showKeys();
    }


    public function showGeneral()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return view('pages.user.user', ['tab_id' => 1]);
    }

    public function showSecurity()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return view('pages.user.user', ['tab_id' => 3]);
    }


    public function showAvatar()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return view('pages.user.user', ['tab_id' => 4]);
    }

    public function showKeys()
    {
        $this->authorize('view', Purchase::class);
        
        $purchases = Auth::user()->purchases;

        return view('pages.user.user', ['tab_id' => 2, 'purchases' => $purchases]);
    }

    public function showWishlist(){
        if (!Auth::check()) {
            return redirect('login');
        }

        $wishlist_games = Auth::user()->wishlist_items;

        return view('pages.user.user', ['tab_id' => 0, 'wishlist_games' -> $wishlist_games]);
    }
}
