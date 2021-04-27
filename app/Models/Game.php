<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use \App\Models\Developer;
use \App\Models\GameImage;

class Game extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public function developer()
    {
        return Developer::find($this->dev_id)->name;
    }

    public function cover_image()
    {
        return  DB::table('games')
        ->join('image_game', 'games.id', '=', 'image_game.game_id')
        ->join('images', 'images.id', '=', 'image_game.image_id')
        ->select('images.path')
        ->where('games.id', '=', $this->id)
        ->first()->path;
    }

    public function images()
    {
        return  DB::table('games')
        ->join('image_game', 'games.id', '=', 'image_game.game_id')
        ->join('images', 'images.id', '=', 'image_game.image_id')
        ->select('images.path')
        ->get();
    }
}
