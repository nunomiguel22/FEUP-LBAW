<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\User;
use \App\Models\Game;

class Review extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function formattedTimestamp($format)
    {
        return date($format, strtotime($this->publication_date));
    }
}