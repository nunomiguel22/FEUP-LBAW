<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Game;
use App\Models\Category;

class HomepageController extends Controller
{
    public function show()
    {
        $homepage_games = $this->homepageGames();

        return view('pages.homepage', $homepage_games);
    }

    public function homepageGames()
    {
        $title_game = array();
        $car_games = array();
        $first_row = array();
        $second_row = array();
        $third_row = array();
        $games = Game::where('listed', '=', 'true')->inRandomOrder()->limit(9)->get();
        
        $game_count = count($games);

        if ($game_count > 0) {
            $title_game = $games[0];
        }
        
        if ($game_count > 2) {
            $car_games = $games->slice(1, 2);
            $first_row = $games->slice(0, 3);
        }
        
        if ($game_count > 5) {
            $second_row = $games->slice(3, 3);
        }
        
        if ($game_count > 8) {
            $third_row = $games->slice(6, 3);
        }

        $categories = Category::all();

        return  [ 'title_game' => $title_game,
        'carousel_games' => $car_games,
        'first_row' => $first_row,
        'second_row' => $second_row,
        'third_row' => $third_row,
        'categories' => $categories];
    }
}
