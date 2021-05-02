<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\User;
use App\Models\Developer;
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

    public function showProducts()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        
        return view('pages.admin.admin', ['tab_id' => 1]);
    }

    public function showSales()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        $tags = Tag::all();
        $developers = Developer::all();
        return view('pages.admin.admin', ['tab_id' => 0, 'developers' => $developers, 'tags' => $tags]);
    }

    public function showNewGame()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        $tags = Tag::all();
        $developers = Developer::all();
        return view('pages.admin.new_game', ['tab_id' => 2, 'developers' => $developers,
                    'tags' => $tags]);
    }

    public function showEditGame($game_id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }

        $game = null;
        try {
            $game = Game::findOrFail($game_id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $tags = Tag::all();
        $developers = Developer::all();
     
        return view('pages.admin.edit_game', ['tab_id' => 2, 'developers' => $developers,
                    'tags' => $tags, 'game' => $game]);
    }
}
