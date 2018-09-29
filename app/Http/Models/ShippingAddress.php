<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends \Eloquent {

    // Don't forget to fill this array
    protected $fillable = ['name', 'user_id', 'email', 'country', 'city', 'district', 'order_time', 'area', 'street', 'building', 'floor', 'landmark', 'mobile', 'code', 'Latitude', 'Longitude'];

}
