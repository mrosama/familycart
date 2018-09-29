<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_seller extends Model {

    protected $guarded = [];

    public function getSeller() {
        return $this->belongsTo('App\Seller', 'seller_id', 'id');
    }

}
