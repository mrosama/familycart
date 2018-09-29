<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_colors_size extends Model {

    protected $guarded = [];

    public function getColor() {
        return $this->belongsTo('App\Color', 'color_id', 'id');
    }

    public function getSize() {
        return $this->belongsTo('App\Size', 'size_id', 'id');
    }

}
