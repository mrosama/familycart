<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends \Eloquent {

    protected $guarded = [];

    public function getCountry() {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

}
