<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Http\Controllers\PurchaseController;


use App\Models\User;
use App\Models\Game;
use App\Models\Purchase;
use App\Models\Image;
use App\Models\Address;


class ProfileController extends Controller
{
    public function show()
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        return $this->profile();
    }
           

    public function profile()
    {
        $games_purchased = array();
        $purchases = Purchase::where('user_id', '=', Auth::user()->id)->get();
        $games_purchased = count($purchases);
        
        return view('pages.profile', ['games_purchased' => $games_purchased]);



    }
}