<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Section;
use App\Branch;
use App\Type;
use App\Brand;
use App\Product;
use Redirect;

class BrandsController extends Controller {

    public function index() {
        $data['brands'] = Brand::all();
        return view('admin.brands.index', $data);
    }

    public function create() {
        $data['sections'] = Section::lists('name_ar', 'id');
        return view('admin.brands.create', $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'section_id' => 'required',
            'branch_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $input = $request->all();
        Brand::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $brand = Brand::findOrFail($id);
        $data['sections'] = Section::lists('name_ar', 'id');
        $data['branches'] = Branch::Where('id', $brand->branch_id)->lists('name_ar', 'id');
        $data['types'] = Type::Where('id', $brand->type_id)->lists('name_ar', 'id');
        $data['brand'] = brand::findOrFail($id);
        return view('admin.brands.edit', $data);
    }

    public function update(Request $request, $id) {
        $brand = Brand::findOrFail($id);
        $this->validate($request, [
            'section_id' => 'required',
            'branch_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);

        $input = $request->all();
        $brand->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        $productIDs = Product::where('brand_id', $id)->select('id', 'image', 'video')->get();
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
