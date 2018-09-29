<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Section;
use App\Branch;
use App\Type;
use App\Brand;
use App\Product;
use Redirect;

class SectionsController extends Controller {

    public function index() {
        $data['sections'] = Section::all();
        return view('admin.sections.index', $data);
    }

    public function create() {
        return View('admin.sections.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/sections/', $imageName
            );
            $data['image'] = $imageName;
        }
        Section::create($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['section'] = Section::findOrFail($id);
        return view('admin.sections.edit', $data);
    }

    public function update(Request $request, $id) {

        $section = Section::findOrFail($id);

        $this->validate($request, ['name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($section->image) {
                \File::delete(public_path() . '/images/sections/' . $section->image);
            }
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/sections/', $imageName
            );
            $data['image'] = $imageName;
        }
        $section->fill($data)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function statusShow($id) {
        $data = array('status' => 1);
        Section::find($id)->update($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function statusHide($id) {
        $data = array('status' => 0);
        Section::find($id)->update($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

//    public function destroy($id) {
//
//        $section = Section::findOrFail($id);
//        $section->delete();
//        Branch::where('section_id', $id)->delete();
//        Type::where('section_id', $id)->delete();
//        Brand::where('section_id', $id)->delete();
//        Product::where('section_id', $id)->delete();
//        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
//    }
}
