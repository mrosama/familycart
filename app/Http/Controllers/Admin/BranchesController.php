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

class BranchesController extends Controller {

    public function index() {
        $data['branches'] = Branch::all();
        return view('admin.branches.index', $data);
    }

    public function create() {
        $data['sections'] = Section::lists('name_ar', 'id');
        return view('admin.branches.create', $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'section_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        $input = $request->all();
        Branch::create($input);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['sections'] = Section::lists('name_ar', 'id');
        $data['branch'] = Branch::findOrFail($id);
        return view('admin.branches.edit', $data);
    }

    public function update(Request $request, $id) {
        $branch = Branch::findOrFail($id);

        $this->validate($request, [
            'section_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);

        $input = $request->all();
        $branch->fill($input)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        Type::where('branch_id', $id)->delete();
        Brand::where('branch_id', $id)->delete();
        $productIDs = Product::where('branch_id', $id)->select('id', 'image', 'video')->get();
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
