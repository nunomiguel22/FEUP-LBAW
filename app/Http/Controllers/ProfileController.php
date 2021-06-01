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
        
        $games_purchased_num = array();
        $purchases = Auth::User()->purchases;
        $games_purchased_num = count($purchases);

        
        return view('pages.profile', ['purchases' => $purchases, 'games_purchased_num'=> $games_purchased_num]);



    }
}