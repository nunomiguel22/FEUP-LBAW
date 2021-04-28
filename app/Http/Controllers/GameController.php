<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Game;

class GameController extends Controller
{
    public function search()
    {
        return Game::where('listed', '=', true)->with('developers', 'categories', 'images')->paginate(3);
    }

    public function showProducts()
    {
        return view('pages.products', []);
    }
}
