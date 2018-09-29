<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Offer;
use App\Best_offer;
use App;

class OffersController extends Controller {

    public function show() {
        $data['lang'] = App::getLocale();
        $data['best_offers'] = Best_offer::all();
        $data['sliders'] = Slider::where('place', 'offers')->get();
        $data['first_off'] = Offer::first();
        $data['first_offers'] = App\Product_offers::where('offer_id', $data['first_off']->id)->get();
        $data['second_off'] = Offer::skip(1)->first();
        $data['second_offers'] = App\Product_offers::where('offer_id', $data['second_off']->id)->get();
        $data['third_off'] = Offer::skip(2)->first();
        $data['third_offers'] = App\Product_offers::where('offer_id', $data['third_off']->id)->get();
        return view('site.offers.show', $data);
    }

}
