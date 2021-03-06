<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\Game;

class GameKey extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $hidden = [
        'game_id', 'user_id', 'available',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public static function getAvailableKey($game_id)
    {
        return GameKey::where('game_id', $game_id)->where('available', true)->first();
    }
}
