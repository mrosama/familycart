<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Color;

class ColorsController extends Controller {

    public function index() {
        $data['colors'] = Color::all();
        return view('admin.colors.index', $data);
    }

    public function create() {
        return View('admin.colors.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $input = $request->all();
        Color::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['color'] = Color::findOrFail($id);
        return view('admin.colors.edit', $data);
    }

    public function update(Request $request, $id) {

        $color = Color::findOrFail($id);
        $this->validate($request, ['name_en' => 'required',
            'name_ar' => 'required']);
        $input = $request->all();
        $color->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
