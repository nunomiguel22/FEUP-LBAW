<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Game;
use App\Models\Category;

class HomepageController extends Controller
{
    // GET /
    public function show()
    {
        $categories = Category::all();
        $games = array();

        foreach ($categories as $category) {
            $games[$category->id] = $category->getRecentGames(9);
        }

        $carousel_games = Game::getRecent(3);
        $title_game = $carousel_games->shift();
        $first_category = $categories->shift();

        return view('pages.homepage', $this->homepageGames());
    }

    // Gets info for homepage cards display (Aux Function)
    public function homepageGames()
    {
        $categories = Category::all();
        $games = array();

        foreach ($categories as $category) {
            $games[$category->id] = $category->getRecentGames(9);
        }

        $carousel_games = Game::getRecent(3);
        $title_game = $carousel_games->shift();
        $first_category = $categories->shift();

        return ['games' => $games, 'title_game' => $title_game,
        'carousel_games' => $carousel_games, 'first_category' => $first_category,
        'categories' => $categories];
    }

    public function showAbout()
    {
        return view('pages.about');
    }
}
