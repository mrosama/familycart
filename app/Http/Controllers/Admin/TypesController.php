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

class TypesController extends Controller {

    public function index() {
        $data['types'] = Type::all();
        return view('admin.types.index', $data);
    }

    public function create() {
        $data['sections'] = Section::lists('name_ar', 'id');
        return view('admin.types.create', $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'section_id' => 'required',
            'branch_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $input = $request->all();
        Type::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['sections'] = Section::lists('name_ar', 'id');
        $data['branches'] = Branch::lists('name_ar', 'id');
        $data['type'] = type::findOrFail($id);
        return view('admin.types.edit', $data);
    }

    public function update(Request $request, $id) {
        $type = Type::findOrFail($id);
        $this->validate($request, [
            'section_id' => 'required',
            'branch_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);

        $input = $request->all();
        $type->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $type = Type::findOrFail($id);
        $type->delete();
        Brand::where('type_id', $id)->delete();
        $productIDs = Product::where('type_id', $id)->select('id', 'image', 'video')->get();
        foreach ($productIDs as $row) {
            Product::where('id', $row->id)->delete();
            if ($row->image) {
                \File::delete(public_path() . '/images/products/' . $product->image);
            }
            if ($row->video) {
                \File::delete(public_path() . '/images/products/' . $product->video);
            }
            \App\Product_advantages::where('product_id', $row->id)->delete();
            \App\Product_colors_size::where('product_id', $row->id)->delete();
            \App\Product_color_images::where('product_id', $row->id)->delete();
        }
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
