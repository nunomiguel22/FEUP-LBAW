<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \App\Models\Country;

class Address extends Model
{
    public $timestamps  = false;

    protected $fillable = [
        'line1', 'line2', 'postal_code', 'city', 'region', 'country_id'
        
    ];

    public function country(){

        return $this->belongsTo(Country::class, 'country_id');

    }


}