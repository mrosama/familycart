<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Best_offer;

class Best_offersController extends Controller {

    public function index() {
        $data['best_offer'] = Best_offer::findOrFail(1);
        return view('admin.offers.best_offers', $data);
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
        $best_offer = Best_offer::findOrFail($id);
        $data = $request->all();


        if ($request->hasFile('main_img')) {
            if ($best_offer->main_img) {
                \File::delete(public_path() . '/images/best_offers/' . $best_offer->image);
            }
            $imageName = str_random(30) . '.' . $request->file('main_img')->getClientOriginalExtension();
            $request->file('main_img')->move(
                    public_path() . '/images/best_offers/', $imageName
            );
            $data['main_img'] = $imageName;
        }

        if ($request->hasFile('first_img')) {
            if ($best_offer->first_img) {
                \File::delete(public_path() . '/images/best_offers/' . $best_offer->first_img);
            }
            $imageName = str_random(30) . '.' . $request->file('first_img')->getClientOriginalExtension();
            $request->file('first_img')->move(
                    public_path() . '/images/best_offers/', $imageName
            );
            $data['first_img'] = $imageName;
        }
        if ($request->hasFile('second_img')) {
            if ($best_offer->second_img) {
                \File::delete(public_path() . '/images/best_offers/' . $best_offer->second_img);
            }
            $imageName = str_random(30) . '.' . $request->file('second_img')->getClientOriginalExtension();
            $request->file('second_img')->move(
                    public_path() . '/images/best_offers/', $imageName
            );
            $data['second_img'] = $imageName;
        }
        if ($request->hasFile('third_img')) {
            if ($best_offer->third_img) {
                \File::delete(public_path() . '/images/best_offers/' . $best_offer->third_img);
            }
            $imageName = str_random(30) . '.' . $request->file('third_img')->getClientOriginalExtension();
            $request->file('third_img')->move(
                    public_path() . '/images/best_offers/', $imageName
            );
            $data['third_img'] = $imageName;
        }
        if ($request->hasFile('fourth_img')) {
            if ($best_offer->fourth_img) {
                \File::delete(public_path() . '/images/best_offers/' . $best_offer->fourth_img);
            }
            $imageName = str_random(30) . '.' . $request->file('fourth_img')->getClientOriginalExtension();
            $request->file('fourth_img')->move(
                    public_path() . '/images/best_offers/', $imageName
            );
            $data['fourth_img'] = $imageName;
        }



        Best_offer::find($id)->update($data);
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
