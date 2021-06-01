<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\Purchase;

class UserController extends Controller
{
    //GET /user
    public function showDefault()
    {
        return $this->showKeys();
    }

    //GET /user/edit
    public function showGeneral()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return view('pages.user.user', ['tab_id' => 1]);
    }

    //GET /user/security
    public function showSecurity()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return view('pages.user.user', ['tab_id' => 3]);
    }

    //GET /user/avatar
    public function showAvatar()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return view('pages.user.user', ['tab_id' => 4]);
    }

    //GET /user/keys
    public function showKeys()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        $purchases = Auth::user()->purchases;

        return view('pages.user.user', ['tab_id' => 2, 'purchases' => $purchases]);
    }
}
