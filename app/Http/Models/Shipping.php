<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends \Eloquent {

    protected $guarded = [];

    public function getCountry() {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }
    public function getCity() {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

}
