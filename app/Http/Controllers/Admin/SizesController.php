<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Size;

class SizesController extends Controller
{
     public function index() {
        $data['sizes'] = Size::all();
        return view('admin.sizes.index', $data);
    }

    public function create() {
        return View('admin.sizes.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        Size::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['size'] = Size::findOrFail($id);
        return view('admin.sizes.edit', $data);
    }

    public function update(Request $request, $id) {

        $size = Size::findOrFail($id);
        $this->validate($request, [  'name' => 'required']);

        $input = $request->all();
        $size->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $size = Size::findOrFail($id);
        $size->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }
}
