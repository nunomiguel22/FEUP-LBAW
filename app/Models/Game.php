<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use \App\Models\Developer;
use \App\Models\Category;
use \App\Models\Image;
use \App\Models\Tag;
use \App\Models\GameKey;
use \App\Models\Review;
use \App\Models\Purchase;

class Game extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $hidden = [
        'developer_id', 'category_id'
    ];

    public function cover_image()
    {
        return $this->images[0]->getPath();
    }

    public function formattedLaunchDate($format)
    {
        return date($format, strtotime($this->launch_date));
    }

    public function hasAvailableKeys()
    {
        return $this->game_keys->where('available', true)->count() > 0;
    }

    public static function getRecent($limit)
    {
        return Game::orderByDesc('launch_date')->limit($limit)->get();
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function cart_items()
    {
        return $this->belongsToMany(User::class, 'cart_items');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function purchases()
    {
        return $this->hasManyThrough(Purchase::class, GameKey::class);
    }

    public function game_keys()
    {
        return $this->hasMany(GameKey::class);
    }

    public static function FTS($search)
    {
        return  DB::table('game_search')->selectRaw('game_id')
            ->whereRaw("search @@ plainto_tsquery('english', ?)", [$search])
            ->pluck('game_id')->toArray();
    }

    public function user_has_key($user_id)
    {
        return $this->purchases->where('user_id', $user_id)->where('status', 'Completed')->first();
    }

    public function user_has_review($user_id)
    {
        return $this->reviews()->where('user_id', $user_id)->first();
    }

    public function wishlist_items()
    {
        return $this->belongsToMany(User::class, 'wishlist_items');
    }
}
