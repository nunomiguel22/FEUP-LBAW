<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\Game;

class Tag extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $fillable = [
        'name',
    ];

    protected $hidden = ['pivot'];

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
