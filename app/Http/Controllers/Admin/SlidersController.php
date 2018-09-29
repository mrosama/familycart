<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use File;

class SlidersController extends Controller {

    public function index() {
        $data['sliders'] = Slider::all();
        return view('admin.sliders.index', $data);
    }

    public function create() {
        return View('admin.sliders.create');
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
                    public_path() . '/images/sliders/', $imageName
            );
            $data['image'] = $imageName;
        }
        Slider::create($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['slider'] = Slider::findOrFail($id);
        return view('admin.sliders.edit', $data);
    }

    public function update(Request $request, $id) {
        $slider = Slider::findOrFail($id);
        $this->validate($request, [
            'link' => 'required'
        ]);
        // upload   image
        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($slider->image) {
                \File::delete(public_path() . '/images/sliders/' . $slider->image);
            }
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/sliders/', $imageName
            );
            $data['image'] = $imageName;
        }
        $slider->fill($data)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح');
    }

    public function destroy($id) {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        if ($slider->image) {
            \File::delete(public_path() . '/images/sliders/' . $slider->image);
        }
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
