<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ads_offer;

class Ads_offersController extends Controller {

    public function index() {
        $data['ads_offer'] = Ads_offer::findOrFail(1);
        return view('admin.offers.ads_offers', $data);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        
    }

    public function update(Request $request, $id) {
        $ads_offer = Ads_offer::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('first_ads')) {
            if ($ads_offer->first_ads) {
                \File::delete(public_path() . '/images/ads_offers/' . $ads_offer->first_ads);
            }
            $imageName = str_random(30) . '.' . $request->file('first_ads')->getClientOriginalExtension();
            $request->file('first_ads')->move(
                    public_path() . '/images/ads_offers/', $imageName
            );
            $data['first_ads'] = $imageName;
        }
        if ($request->hasFile('second_ads')) {
            if ($ads_offer->second_ads) {
                \File::delete(public_path() . '/images/ads_offers/' . $ads_offer->second_ads);
            }
            $imageName = str_random(30) . '.' . $request->file('second_ads')->getClientOriginalExtension();
            $request->file('second_ads')->move(
                    public_path() . '/images/ads_offers/', $imageName
            );
            $data['second_ads'] = $imageName;
        }
        if ($request->hasFile('third_ads')) {
            if ($ads_offer->third_ads) {
                \File::delete(public_path() . '/images/ads_offers/' . $ads_offer->third_ads);
            }
            $imageName = str_random(30) . '.' . $request->file('third_ads')->getClientOriginalExtension();
            $request->file('third_ads')->move(
                    public_path() . '/images/ads_offers/', $imageName
            );
            $data['third_ads'] = $imageName;
        }
        if ($request->hasFile('fourth_ads')) {
            if ($ads_offer->fourth_ads) {
                \File::delete(public_path() . '/images/ads_offers/' . $ads_offer->fourth_ads);
            }
            $imageName = str_random(30) . '.' . $request->file('fourth_ads')->getClientOriginalExtension();
            $request->file('fourth_ads')->move(
                    public_path() . '/images/ads_offers/', $imageName
            );
            $data['fourth_ads'] = $imageName;
        }
        Ads_offer::find($id)->update($data);
        return redirect()->back()->with('success', 'تمت عملية التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
