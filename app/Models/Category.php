<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\Game;

class Category extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function getRecentGames($limit)
    {
        return $this->games()->orderByDesc('launch_date')->limit($limit)->get();
    }
}
