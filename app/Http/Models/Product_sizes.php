<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_sizes extends \Eloquent {

    protected $guarded = [];

    public function getSize() {
        return $this->belongsTo('App\Size', 'size_id', 'id');
    }

}
