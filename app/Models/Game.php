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

    public function developer()
    {
        return Developer::find($this->dev_id)->name;
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
