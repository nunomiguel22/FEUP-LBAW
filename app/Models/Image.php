<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;
}
