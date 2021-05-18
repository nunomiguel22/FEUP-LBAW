<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\Models\Game;

class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function cart_items()
    {
        return $this->belongsToMany(Game::class, 'cart_items');
    }

    public function gameInCart($game_id)
    {
        return $this->cart_items->find($game_id);
    }
}
