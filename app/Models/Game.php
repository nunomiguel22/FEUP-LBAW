<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use \App\Models\Developer;
use \App\Models\Category;
use \App\Models\Image;

class Game extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $hidden = [
        'developer_id', 'category_id', 'listed'
    ];

    public function cover_image()
    {
        return $this->images[0]->path;
    }


    public function developers()
    {
        return $this->belongsTo(Developer::class, 'developer_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
