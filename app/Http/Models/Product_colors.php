<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_colors extends \Eloquent {

    protected $guarded = [];

    public function getColor() {
        return $this->belongsTo('App\Color', 'color_id', 'id');
    }

}
