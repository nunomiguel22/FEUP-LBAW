<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


use \App\Models\Game;
use \App\Models\Review;
use \App\Models\Image;
use \App\Models\Purchase;
use \App\Models\Address;

class User extends Authenticatable implements MustVerifyEmail
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
        'first_name', 'last_name', 'username', 'email', 'password', 'description', 'image_id', 'address_id'
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

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function cart_items()
    {
        return $this->belongsToMany(Game::class, 'cart_items');
    }

    public function gameInCart($game_id)
    {
        return $this->cart_items->find($game_id);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
