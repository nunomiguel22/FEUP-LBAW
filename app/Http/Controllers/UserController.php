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
        return $this->showGeneral();
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
}
