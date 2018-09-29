<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Offer;

class OffersController extends Controller {

    public function index() {
        $data['offers'] = Offer::all();
        return view('admin.offers.index', $data);
    }

    public function create() {
        return View('admin.offers.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $input = $request->all();
        Offer::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['offer'] = Offer::findOrFail($id);
        return view('admin.offers.edit', $data);
    }

    public function update(Request $request, $id) {

        $offer = Offer::findOrFail($id);
        $this->validate($request, ['name_en' => 'required',
            'name_ar' => 'required']);

        $input = $request->all();
        $offer->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
