<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Game;

class HomepageController extends Controller
{
    public function show()
    {
        $games = Game::inRandomOrder()->limit(9)->get();
        $car_games = $games->slice(0, 3);
        $first_row = $car_games;
        $second_row = $games->slice(3, 3);
        $third_row = $games->slice(6, 3);
        return view('pages.homepage', ['carousel_games' => $car_games,
                                        'first_row' => $first_row,
                                        'second_row' => $second_row,
                                        'third_row' => $third_row]);
    }
}
