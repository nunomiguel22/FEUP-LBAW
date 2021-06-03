<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\Game;

class Developer extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
