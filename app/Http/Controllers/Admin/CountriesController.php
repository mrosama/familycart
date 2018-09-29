<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use Redirect;

class CountriesController extends Controller {

    public function index() {
        $data['countries'] = Country::all();
        return view('admin.countries.index', $data);
    }

    public function create() {
        return View('admin.countries.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $input = $request->all();
        Country::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['country'] = Country::findOrFail($id);
        return view('admin.countries.edit', $data);
    }

    public function update(Request $request, $id) {

        $country = Country::findOrFail($id);
        $this->validate($request, ['name_en' => 'required',
            'name_ar' => 'required']);

        $input = $request->all();
        $country->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $country = Country::findOrFail($id);
        $country->delete();
        City::where('country_id', $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
