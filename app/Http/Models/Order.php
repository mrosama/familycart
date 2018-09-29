<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends \Eloquent {

    protected $guarded = [];

    public function getUser() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
