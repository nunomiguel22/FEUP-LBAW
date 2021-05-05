<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use \App\Models\User;

class Purchase extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $hidden = [
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game_key()
    {
        return $this->belongsTo(GameKey::class);
    }
}
