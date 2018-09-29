<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    protected $guarded = [];

    public function getUser() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getCountry() {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

    public function getCity() {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

}
