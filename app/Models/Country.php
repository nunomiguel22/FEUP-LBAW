<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\Address;

class Country extends Model
{
    public $timestamps  = false;

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
