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
        return  DB::table('game')
        ->join('game_image', 'game.id', '=', 'game_image.game_id')
        ->join('photo', 'photo.id', '=', 'game_image.photo_id')
        ->select('photo.path')
        ->where('game.id', '=', $this->id)
        ->first()->path;
    }

    public function images()
    {
        return  DB::table('game')
        ->join('game_image', 'game.id', '=', 'game_image.game_id')
        ->join('photo', 'photo.id', '=', 'game_image.photo_id')
        ->select('photo.path')
        ->get();
    }
}
