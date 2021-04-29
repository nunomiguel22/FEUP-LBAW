<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $fillable = [
        'path',
    ];

    protected $hidden = ['pivot'];
}
