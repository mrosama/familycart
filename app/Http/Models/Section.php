<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends \Eloquent {

    protected $guarded = [];

    public function getSeller() {
        return $this->belongsTo('App\Seller', 'seller_id', 'id');
    }

}
