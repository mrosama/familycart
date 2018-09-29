<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use Redirect;

class CitiesController extends Controller {

    public function index() {
        $data['cities'] = City::all();
        return view('admin.cities.index', $data);
    }

    public function create() {
        $data['countries'] = Country::lists('name_ar', 'id');
        return view('admin.cities.create', $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'country_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'charge_value' => 'required'
        ]);
        $input = $request->all();
        City::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['countries'] = Country::lists('name_ar', 'id');
        $data['city'] = City::findOrFail($id);
        return view('admin.cities.edit', $data);
    }

    public function update(Request $request, $id) {
        $branch = City::findOrFail($id);

        $this->validate($request, [
            'country_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'charge_value' => 'required'
        ]);

        $input = $request->all();
        $branch->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $branch = City::findOrFail($id);
        $branch->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
