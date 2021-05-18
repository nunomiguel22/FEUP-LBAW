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


class ProfileController extends Controller
{
    public function show()
    {

        if (!Auth::check()) {
            throw new AuthorizationException('This page is limited authenticated users');
        }

        return $this->profile();
    }
           

    public function profile()
    {
        $games_purchased = array();

        $user = Auth::user();
        $avatar_id = Auth::user()->avatar_id;
        $avatar_path = Image::where('id', '=', $avatar_id)->get();
        $username = Auth::user()->username;
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $country = Auth::user()->country;
        $purchases = Purchase::where('user_id', '=', Auth::user()->id)->get();
        $games_purchased = count($purchases);
        $description = Auth::user()->description;
        
        return view('pages.profile', ['user' => $user, 'avatar_path' => $avatar_path,
        'username' => $username, 'first_name' => $first_name,'last_name' =>  $last_name,
        'country' => $country, 'purchases' => $purchases, 'games_purchased' => $games_purchased,
        'description' => $description]);



    }
}