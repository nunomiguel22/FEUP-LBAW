<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Photo;

class GameImage extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $table = 'game_image';

    public function paths()
    {
        return $this->hasMany('\App\Models\Photo', 'photo_id');
    }
}
