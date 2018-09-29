<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_advantages extends \Eloquent {

    protected $guarded = [];

    public function getFeature() {
        return $this->belongsTo('App\Feature', 'feature_id', 'id');
    }

}
