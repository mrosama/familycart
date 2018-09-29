<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Feature;

class FeaturesController extends Controller {

    public function index() {
        $data['features'] = Feature::all();
        return view('admin.features.index', $data);
    }

    public function create() {
        return View('admin.features.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $input = $request->all();
        Feature::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['feature'] = Feature::findOrFail($id);
        return view('admin.features.edit', $data);
    }

    public function update(Request $request, $id) {

        $feature = Feature::findOrFail($id);
        $this->validate($request, ['name_en' => 'required',
            'name_ar' => 'required']);

        $input = $request->all();
        $feature->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        //City::where('feature_id', $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
