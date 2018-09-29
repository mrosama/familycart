<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends \Eloquent {

    protected $fillable = ['section_id', 'branch_id', 'type_id', 'brand_id', 'seller_id', 'name_ar', 'name_en', 'small_image', 'meduim_image', 'image' , 'original_price', 'discount_price', 'quantity', 'duration_charging', 'duration_delivery', 'guarantee', 'payment_on_delivery', 'gift_wrapping', 'free_charge', 'color_id', 'size_id', 'details_ar', 'details_en', 'video'];

    public function getSection() {
        return $this->belongsTo('App\Section', 'section_id', 'id');
    }

    public function getBranch() {
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }

    public function getType() {
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }

    public function getBrand() {
        return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }

    public function getColor() {
        return $this->belongsTo('App\Color', 'color_id', 'id');
    }

    public function getSize() {
        return $this->belongsTo('App\Size', 'size_id', 'id');
    }

    public function getSeller() {
        return $this->belongsTo('App\Seller', 'seller_id', 'id');
    }

}
