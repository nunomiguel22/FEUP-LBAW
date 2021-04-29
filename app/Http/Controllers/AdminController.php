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
use App\Models\Tag;

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
        $tags = Tag::all();
        $categories = Category::all();
        $developers = Developer::all();
        return view('pages.admin', ['tab_id' => 0, 'developers' => $developers, 'categories' => $categories, 'tags' => $tags]);
    }

    public function showNewGame()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        $tags = Tag::all();
        $categories = Category::all();
        $developers = Developer::all();
        return view('pages.admin', ['tab_id' => 2, 'developers' => $developers, 'categories' => $categories, 'tags' => $tags]);
    }
}
