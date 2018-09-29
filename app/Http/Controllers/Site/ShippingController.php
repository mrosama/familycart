<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Auth;
use Cart;
use Redirect;
use Session;
use App\City;
use App\Country;
use App\Shipping;

class ShippingController extends Controller {

    public function show_shipping() {
        $data['lang'] = App::getLocale();
        if ($data['lang'] == 'en')
            $data['countries'] = Country::lists('name_en', 'id');
        else
            $data['countries'] = Country::lists('name_ar', 'id');
        if ($data['lang'] == 'en')
            $data['cities'] = City::lists('name_en', 'id');
        else
            $data['cities'] = City::lists('name_ar', 'id');

        if (Auth::user())
            $data['shipping_data'] = Shipping::where('user_id', Auth::user()->id)->first();
        if (Cart::count() == 0)
            return Redirect::to('/' . $data['lang']);
        
        return view('site.shipping.show', $data);
    }

    public function store_shipping(Request $request) {
        if ($request->gift_text)
            Session::set('gift_text', $request->gift_text);
        $this->validate($request, [
            'full_name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'mobile' => 'required'
        ]);
        $data = $request->except('gift_text');
        $data['user_id'] = Auth::user()->id;
        Shipping::create($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function update_shipping(Request $request, $id) {
        if ($request->gift_text)
            Session::set('gift_text', $request->gift_text);
        $this->validate($request, [
            'full_name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'mobile' => 'required'
        ]);
        $data = $request->except('gift_text');
        $data['user_id'] = Auth::user()->id;
        Shipping::find($id)->update($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح');
    }

}
