<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\User;

class AdminController extends Controller
{
    public function showDefault()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        return $this->showSales();
    }

    public function showSales()
    {
        return view('pages.admin', ['tab_id' => 0]);
    }

    public function showNewGame()
    {
        return view('pages.admin', ['tab_id' => 2]);
    }
}
