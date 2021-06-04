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
    // GET /user/profile
    public function show()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return $this->profile();
    }
           
    //Gets games info for recente games of profile page (Aux Function)
    public function profile()
    {
        
        $purchases = Auth::user()->purchases()->orderByDesc('timestamp')->limit(12)->get();
        $games_purchased_num = Auth::user()->purchases()->count();

        return view('pages.profile', ['purchases' => $purchases, 'games_purchased_num'=> $games_purchased_num]);
    }
}
