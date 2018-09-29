<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ad;
use File;

class AdsController extends Controller {

    public function index() {
        $data['ads'] = Ad::all();
        return view('admin.ads.index', $data);
    }

    public function create() {
        return View('admin.ads.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'link' => 'required',
            'image' => 'required'
        ]);
        // upload   image
        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/ads/', $imageName
            );
            $data['image'] = $imageName;
        }
        Ad::create($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['ad'] = Ad::findOrFail($id);
        return view('admin.ads.edit', $data);
    }

    public function update(Request $request, $id) {
        $ad = Ad::findOrFail($id);
        $this->validate($request, [
            'link' => 'required'
        ]);
        // upload   image
        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($ad->image) {
                \File::delete(public_path() . '/images/ads/' . $ad->image);
            }
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/ads/', $imageName
            );
            $data['image'] = $imageName;
        }
        $ad->fill($data)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح');
    }

    public function destroy($id) {
        $ad = Ad::findOrFail($id);
        $ad->delete();
        if ($ad->image) {
            \File::delete(public_path() . '/images/ads/' . $ad->image);
        }
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
