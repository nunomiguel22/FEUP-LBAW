<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use \App\Models\Developer;
use \App\Models\Image;

class Game extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public function developers()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'id');
    }

    public function cover_image()
    {
        return $this->images[0]->path;
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}
