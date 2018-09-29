<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Seller;
use App\Product_seller;

class SellersController extends Controller {

    public function index() {
        $data['sellers'] = Seller::all();
        return view('admin.sellers.index', $data);
    }

    public function create() {
        return View('admin.sellers.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'trade_name' => 'required',
            'trade_name_en' => 'required',
            'trade_type' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $data = $request->all();
        Seller::create($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['seller'] = Seller::findOrFail($id);
        return view('admin.sellers.edit', $data);
    }

    public function update(Request $request, $id) {

        $seller = Seller::findOrFail($id);

        $this->validate($request, [
            'trade_name' => 'required',
            'trade_name_en' => 'required',
            'trade_type' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $data = $request->all();
        $seller->fill($data)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {

        $seller = Seller::findOrFail($id);
        $seller->delete();
        Product_seller::where('seller_id' , $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }
}
