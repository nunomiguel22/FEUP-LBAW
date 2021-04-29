<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\User;
use App\Models\Developer;
use App\Models\Category;
use App\Models\Game;

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
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        $categories = Category::all();
        $developers = Developer::all();
        return view('pages.admin', ['tab_id' => 0, 'developers' => $developers, 'categories' => $categories]);
    }

    public function showNewGame()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        $categories = Category::all();
        $developers = Developer::all();
        return view('pages.admin', ['tab_id' => 2, 'developers' => $developers, 'categories' => $categories]);
    }
}
