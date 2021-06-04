<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\User;
use App\Models\Developer;
use App\Models\Game;
use App\Models\GameKey;
use App\Models\Purchase;
use App\Models\Tag;
use App\Models\Category;

class AdminController extends Controller
{
    // GET /admin
    public function showDefault(Request $request)
    {
        return $this->showSales($request);
    }

    // GET /admin/products
    public function showProducts()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        
        return view('pages.admin.admin', ['tab_id' => 1]);
    }

    // GET /admin/sales
    public function showSales(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }

        $purchases = Purchase::query();
        if ($request->user_id) {
            $purchases->where('user_id', $request->user_id);
        }

        $purchases = $purchases->paginate(10);
    
        return view('pages.admin.admin', ['tab_id' => 0, 'purchases' => $purchases]);
    }

    // GET /admin/users
    public function showUsers(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }

        $users = User::query();
        if ($request->user_id) {
            $users->where('id', $request->user_id);
        }

        $users = $users->paginate(10);
    
        return view('pages.admin.admin', ['tab_id' => 2, 'users' => $users]);
    }
    // GET /admin/products/add_product
    public function showNewGame()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }
        
        $tags = Tag::all();
        $developers = Developer::all();
        $categories = Category::all();
        return view('pages.admin.new_game', ['developers' => $developers,
                    'tags' => $tags, 'categories' => $categories]);
    }

    // GET /admin/products/{id}/edit
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
        $categories = Category::all();
        $tags = Tag::all();
        $developers = Developer::all();
     
        return view('pages.admin.edit_game', ['developers' => $developers,
                    'tags' => $tags, 'game' => $game, 'categories' => $categories]);
    }

    // GET /admin/products/{id}/keys
    public function showEditKeys($game_id)
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

        $used_keys = $game->game_keys->where('available', false);
        $available_keys = $game->game_keys->where('available', true);
     
        return view('pages.admin.edit_keys', ['game' => $game, 'used_keys' => $used_keys,
                                               'available_keys' => $available_keys]);
    }
}
