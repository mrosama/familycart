<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Section;
use App\Branch;
use App\Product;
use App\Type;
use App\Brand;
use App\Product_images;
use App\Product_colors;
use App\Product_sizes;
use App\Color;
use App\Size;
use App\Offer;
use App\Seller;
use App\Feature;
use App\Product_seller;
use App\Product_offers;
use App\Product_advantages;
use App\Product_color_images;
use App\Product_colors_size;
use Image;

class ProductsController extends Controller {

    public function index() {
        $data['products'] = Product::all();
        return view('admin.products.index', $data);
    }

    public function create() {
        $data['sections'] = Section::lists('name_ar', 'id');
        $data['colors'] = Color::lists('name_ar', 'id');
        $data['sizes'] = Size::lists('name', 'id');
        $data['sellers'] = Seller::lists('trade_name', 'id');
        return view('admin.products.create', $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'section_id' => 'required',
            'branch_id' => 'required',
            'brand_id' => 'required',
            'seller_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'discount_price' => 'required',
            'duration_charging' => 'required',
            'duration_delivery' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
            'image' => 'required',
        ]);
        // upload original  image
        $data = $request->except('more_colors', 'more_sizes');


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $smallDestinationPath = public_path('/images/products/small');
            $meduimDestinationPath = public_path('/images/products/meduim');

            // Meduim Image Resize
            $img->resize(163, 163, function ($constraint) {
                $constraint->aspectRatio();
            })->save($meduimDestinationPath . '/' . $imageName);

            // Small Image Resize
            $img->resize(50, 50, function ($constraint) {
                $constraint->aspectRatio();
            })->save($smallDestinationPath . '/' . $imageName);

            // Original Image
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath, $imageName);


            $data['image'] = $imageName;
            $data['small_image'] = $imageName;
            $data['meduim_image'] = $imageName;
        }

        // upload video 
        if ($request->hasFile('video')) {
            $videoName = str_random(30) . '.' . $request->file('video')->getClientOriginalExtension();
            $request->file('video')->move(
                    public_path() . '/videos/products/', $videoName
            );
            $data['video'] = $videoName;
        }

        $product = Product::create($data);
        $product_id = $product->id;

        // upload more images 
        if (count($request->file('more_images')) > 0) {
            foreach ($request->file('more_images') as $image) {
                if ($image != null) {
//                    $imageName = str_random(30) . '.' . $image->getClientOriginalExtension();
//                    $image->move(public_path() . '/images/products/', $imageName);
//                    $data_image['image'] = $imageName;

                    $imageName = str_random(30) . '.' . $image->getClientOriginalExtension();
                    $img = Image::make($image->getRealPath());
                    $smallDestinationPath = public_path('/images/products/small');
                    $meduimDestinationPath = public_path('/images/products/meduim');

                    // Meduim Image Resize
                    $img->resize(163, 163, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($meduimDestinationPath . '/' . $imageName);

                    // Small Image Resize
                    $img->resize(50, 50, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($smallDestinationPath . '/' . $imageName);

                    // Original Image
                    $destinationPath = public_path('/images/products');
                    $image->move($destinationPath, $imageName);

                    $data_image['image'] = $imageName;
                    $data_image['small_image'] = $imageName;
                    $data_image['meduim_image'] = $imageName;
                    $data_image['product_id'] = $product_id;
                    Product_images::create($data_image);
                }
            }
        }

        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['product'] = Product::findOrFail($id);
        $data['sellers'] = Seller::lists('trade_name', 'id');
        $data['sections'] = Section::lists('name_ar', 'id');
        $data['branches'] = Branch::where('section_id', $data['product']->section_id)->lists('name_ar', 'id');
        $data['types'] = Type::where('branch_id', $data['product']->branch_id)->lists('name_ar', 'id');
        $data['brands'] = Brand::where('type_id', $data['product']->type_id)->lists('name_ar', 'id');
        $data['product_images'] = Product_images::where('product_id', $id)->get();
        $data['product_colors'] = Product_colors::where('product_id', $id)->get();
        $data['product_sizes'] = Product_sizes::where('product_id', $id)->get();
        $data['colors'] = Color::lists('name_ar', 'id');
        $data['sizes'] = Size::lists('name', 'id');

        return view('admin.products.edit', $data);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'section_id' => 'required',
            'branch_id' => 'required',
            'brand_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'discount_price' => 'required',
            'duration_charging' => 'required',
            'duration_delivery' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $input = $request->all();

        // update original  image
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image) {
                \File::delete(public_path() . '/images/products/' . $product->image);
                \File::delete(public_path() . '/images/products/small/' . $product->image);
                \File::delete(public_path() . '/images/products/meduim/' . $product->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $smallDestinationPath = public_path('/images/products/small');
            $meduimDestinationPath = public_path('/images/products/meduim');

            // Meduim Image Resize
            $img->resize(163, 163, function ($constraint) {
                $constraint->aspectRatio();
            })->save($meduimDestinationPath . '/' . $imageName);

            // Small Image Resize
            $img->resize(50, 50, function ($constraint) {
                $constraint->aspectRatio();
            })->save($smallDestinationPath . '/' . $imageName);

            // Original Image
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath, $imageName);


            $data['image'] = $imageName;
            $data['small_image'] = $imageName;
            $data['meduim_image'] = $imageName;
        } else {
            $data['image'] = $product->image;
        }

        // update video 
        if ($request->hasFile('video')) {
            if ($product->video) {
                \File::delete(public_path() . '/images/products/' . $product->video);
            }
            $videoName = str_random(30) . '.' . $request->file('video')->getClientOriginalExtension();
            $request->file('video')->move(
                    public_path() . '/videos/products/', $videoName
            );
            $data['video'] = $videoName;
        } else {
            $data['video'] = $product->video;
        }
        $product->update($data);
        // $product->fill($data)->save();
        // upload more images 
        if (count($request->file('more_images')) > 0) {
            foreach ($request->file('more_images') as $image) {
                if ($image != null) {
//                    $imageName = str_random(30) . '.' . $image->getClientOriginalExtension();
//                    $image->move(public_path() . '/images/products/', $imageName);
//                    $data_image['image'] = $imageName;

                    $imageName = str_random(30) . '.' . $image->getClientOriginalExtension();
                    $img = Image::make($image->getRealPath());
                    $smallDestinationPath = public_path('/images/products/small');
                    $meduimDestinationPath = public_path('/images/products/meduim');

                    // Meduim Image Resize
                    $img->resize(163, 163, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($meduimDestinationPath . '/' . $imageName);

                    // Small Image Resize
                    $img->resize(50, 50, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($smallDestinationPath . '/' . $imageName);

                    // Original Image
                    $destinationPath = public_path('/images/products');
                    $image->move($destinationPath, $imageName);

                    $data_image['image'] = $imageName;
                    $data_image['small_image'] = $imageName;
                    $data_image['meduim_image'] = $imageName;

                    $data_image['product_id'] = $id;
                    Product_images::create($data_image);
                }
            }
        }

        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product_images = Product_images::where('product_id', $product->id)->get();
//        if ($product->image) {
//            \File::delete(public_path() . '/images/products/' . $product->image);
//        }
        if ($product->video) {
            \File::delete(public_path() . '/videos/products/' . $product->video);
        }
        $product->delete();
        foreach ($product_images as $pro_imgs) {
            \File::delete(public_path() . '/images/products/' . $pro_imgs->image);
            Product_images::where('id', $pro_imgs->id)->delete();
        }
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

    public function delete_video($id) {
        $product = Product::findOrFail($id);
        $product->update(['video' => '']);
        if ($product->video) {
            \File::delete(public_path() . '/images/products/' . $product->video);
        }
        return redirect()->back()->with('success', 'لقد تمت عملية حذف الفيديو بنجاح');
    }

    public function delete_image($id) {
        $product_image = Product_images::findOrFail($id);
        \File::delete(public_path() . '/images/products/' . $product_image->image);
        Product_images::where('id', $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية حذف الصورة بنجاح');
    }

    // ======================= Colors =======================

    public function show_colors($id) {
        $data['product_id'] = $id;
        $data['colors'] = Color::lists('name_ar', 'id');
        $data['product_colors'] = product_colors::where('product_id', $id)->get();
        return view('admin.products.show_colors', $data);
    }

    public function add_colors(Request $request, $product_id) {
        $this->validate($request, [
            'color_id' => 'required',
            'quantity' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'original_price' => 'required',
            'discount_price' => 'required',
            'image' => 'required',
        ]);

        $data = $request->except('more_images');
        // upload original images
        if ($request->hasFile('image')) {
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/products/', $imageName
            );
            $data['image'] = $imageName;
        }


        $data['product_id'] = $product_id;
        $product_color = Product_colors::create($data);

        $product_color_id = $product_color->id;
        // upload more images 
        if (count($request->file('more_images')) > 0) {
            foreach ($request->file('more_images') as $image) {
                if ($image != null) {
                    $imageName = str_random(30) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path() . '/images/products/', $imageName);
                    $data_image['image'] = $imageName;
                    $data_image['product_color_id'] = $product_color_id;
                    Product_color_images::create($data_image);
                }
            }
        }
        return redirect()->back()->with('success', 'لقد تمت عملية  الاضافة بنجاح');
    }

    public function edit_color($id) {
        $data['product_id'] = $id;
        $data['colors'] = Color::lists('name_ar', 'id');
        $data['product_color'] = Product_colors::findOrFail($id);
        $data['product_color_images'] = Product_color_images::where('product_color_id', $id)->get();
        return view('admin.products.edit_color', $data);
    }

    public function update_color(Request $request, $id) {
        $this->validate($request, [
            'color_id' => 'required',
            'quantity' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'original_price' => 'required',
            'discount_price' => 'required',
            'image' => 'required',
        ]);
        $data = $request->except('more_images');
        if ($request->hasFile('image')) {
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/products/', $imageName
            );
            $data['image'] = $imageName;
        }

        Product_colors::find($id)->update($data);

        // upload more images 
        if (count($request->file('more_images')) > 0) {
            foreach ($request->file('more_images') as $image) {
                if ($image != null) {
                    $imageName = str_random(30) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path() . '/images/products/', $imageName);
                    $data_image['image'] = $imageName;
                    $data_image['product_color_id'] = $id;
                    Product_color_images::create($data_image);
                }
            }
        }
        return redirect()->back()->with('success', 'لقد تمت عملية  التعديل بنجاح');
    }

    public function delete_color($id) {
        Product_colors::where('id', $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف  بنجاح');
    }

    public function delete_color_image($id) {
        $product_color_image = Product_color_images::findOrFail($id);
        \File::delete(public_path() . '/images/products/' . $product_color_image->image);
        Product_color_images::where('id', $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية حذف الصورة بنجاح');
    }

    // ======================= Colors And Sizes =======================

    public function show_colors_sizes($id) {
        $data['product_id'] = $id;
        $data['colors'] = Color::lists('name_ar', 'id');
        $data['sizes'] = Size::lists('name', 'id');
        $data['product_colors_sizes'] = Product_colors_size::where('product_id', $id)->get();
        return view('admin.products.show_colors_sizes', $data);
    }

    public function add_colors_sizes(Request $request, $product_id) {

        if ($request->get('color_id') == '' && $request->get('size_id') == '') {
            return redirect()->back()->with('error', 'يجب اختيار اللون او الحجم او الاثنين معا');
        }
        $this->validate($request, [
            'quantity' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'discount_price' => 'required',
            'image' => 'required',
        ]);

        $data = $request->except('more_images');
        // upload original images
        if ($request->hasFile('image')) {
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/products/', $imageName
            );
            $data['image'] = $imageName;
        }


        $data['product_id'] = $product_id;
        $product_color_size = Product_colors_size::create($data);

        $product_color_size_id = $product_color_size->id;
        // upload more images 
        if (count($request->file('more_images')) > 0) {
            foreach ($request->file('more_images') as $image) {
                if ($image != null) {
                    $imageName = str_random(30) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path() . '/images/products/', $imageName);
                    $data_image['image'] = $imageName;
                    $data_image['product_color_id'] = $product_color_size_id;
                    Product_color_images::create($data_image);
                }
            }
        }
        return redirect()->back()->with('success', 'لقد تمت عملية  الاضافة بنجاح');
    }

    public function edit_color_size($id) {
        $data['colors'] = Color::lists('name_ar', 'id');
        $data['sizes'] = Size::lists('name', 'id');
        $data['color_size_data'] = Product_colors_size::findOrFail($id);
        $data['product_color_images'] = Product_color_images::where('product_color_id', $id)->get();
        return view('admin.products.edit_color_size', $data);
    }

    public function update_color_size(Request $request, $id) {
        if ($request->get('color_id') == '' && $request->get('size_id') == '') {
            return redirect()->back()->with('error', 'يجب اختيار اللون او الحجم او الاثنين معا');
        }
        $this->validate($request, [
            'quantity' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'discount_price' => 'required',
        ]);

        $data = $request->except('more_images');
        if ($request->hasFile('image')) {
            $imageName = str_random(30) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                    public_path() . '/images/products/', $imageName
            );
            $data['image'] = $imageName;
        }
        Product_colors_size::find($id)->update($data);
        // upload more images 
        if (count($request->file('more_images')) > 0) {
            foreach ($request->file('more_images') as $image) {
                if ($image != null) {
                    $imageName = str_random(30) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path() . '/images/products/', $imageName);
                    $data_image['image'] = $imageName;
                    $data_image['product_color_id'] = $id;
                    Product_color_images::create($data_image);
                }
            }
        }
        return redirect()->back()->with('success', 'لقد تمت عملية  التعديل بنجاح');
    }

    public function delete_color_size($id) {
        Product_colors_size::where('id', $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف  بنجاح');
    }

//    public function delete_color_size_image($id) {
//        $product_color_image = Product_color_images::findOrFail($id);
//        \File::delete(public_path() . '/images/products/' . $product_color_image->image);
//        Product_color_images::where('id', $id)->delete();
//        return redirect()->back()->with('success', 'لقد تمت عملية حذف الصورة بنجاح');
//    }
    // ======================= Sizes =======================

    public function show_sizes($id) {
        $data['product_id'] = $id;
        $data['sizes'] = Size::lists('name', 'id');
        $data['product_sizes'] = product_sizes::where('product_id', $id)->get();
        return view('admin.products.show_sizes', $data);
    }

    public function add_sizes(Request $request, $product_id) {
        $this->validate($request, [
            'size_id' => 'required',
            'quantity' => 'required'
        ]);
        $data = $request->all();
        $data['product_id'] = $product_id;
        Product_sizes::create($data);
        return redirect()->back()->with('success', 'لقد تمت عملية  الاضافة بنجاح');
    }

    public function edit_size($id) {
        $data['product_id'] = $id;
        $data['sizes'] = Size::lists('name', 'id');
        $data['product_size'] = Product_sizes::findOrFail($id);
        return view('admin.products.edit_size', $data);
    }

    public function update_size(Request $request, $product_size_id) {

        $this->validate($request, [
            'size_id' => 'required',
            'quantity' => 'required'
        ]);
        $data = $request->all();

        Product_sizes::find($product_size_id)->update($data);
        return redirect()->back()->with('success', 'لقد تمت عملية  التعديل بنجاح');
    }

    public function delete_size($id) {
        Product_sizes::where('id', $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف  بنجاح');
    }

    // ======================= Sizes =======================

    public function show_advantages($id) {
        $data['product_id'] = $id;
        $data['features'] = Feature::lists('name_ar', 'id');
        $data['product_advantages'] = Product_advantages::where('product_id', $id)->get();
        return view('admin.products.show_advantages', $data);
    }

    public function add_advantages(Request $request, $product_id) {
        $this->validate($request, [
            'feature_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'value_ar' => 'required',
            'value_en' => 'required'
        ]);
        $data = $request->all();
        $data['product_id'] = $product_id;
        Product_advantages::create($data);
        return redirect()->back()->with('success', 'لقد تمت عملية  الاضافة بنجاح');
    }

    public function edit_advantage($id) {
        $data['product_id'] = $id;
        $data['features'] = Feature::lists('name_ar', 'id');
        $data['advantage'] = Product_advantages::find($id);
        return view('admin.products.edit_advantage', $data);
    }

    public function update_advantage(Request $request, $product_advantage_id) {

        $this->validate($request, [
            'feature_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'value_ar' => 'required',
            'value_en' => 'required'
        ]);
        $data = $request->all();
        Product_advantages::find($product_advantage_id)->update($data);
        return redirect()->back()->with('success', 'لقد تمت عملية  التعديل بنجاح');
    }

    // ================ offers -==================

    public function offers($id) {
        $product_offers = Product_offers::all();
        $product_id = array();
        foreach ($product_offers as $offer) {
            array_push($product_id, $offer->product_id);
        }
        // Edit if Offer Exists
        if (in_array($id, $product_id)) {
            $data['offers'] = Offer::lists('name_ar', 'id');
            $data['product_id'] = $id;
            $data['product_offer'] = Product_offers::where('product_id', $id)->first();
            return view('admin.products.offer_edit', $data);
        }
        // Else Add New offer 
        else {
            $data['offers'] = Offer::lists('name_ar', 'id');
            $data['product_id'] = $id;
            return view('admin.products.offer_create', $data);
        }
    }

    public function add_offer(Request $request, $product_id) {

        $this->validate($request, [
            'offer_id' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required'
        ]);
        $data = $request->all();
        $data['product_id'] = $product_id;
        Product_offers::create($data);
        return redirect()->back()->with('success', 'لقد تمت عملية  الاضافة بنجاح');
    }

    public function update_offer(Request $request, $product_offer_id) {

        $this->validate($request, [
            'offer_id' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required'
        ]);
        $data = $request->all();
        Product_offers::find($product_offer_id)->update($data);
        return redirect()->back()->with('success', 'لقد تمت عملية  التعديل بنجاح');
    }

    // ================ Sellers -==================

    public function sellers($id) {
        $data['product_sellers'] = Product_seller::where('product_id', $id)->get();
        $data['sellers'] = Seller::lists('trade_name', 'id');
        $data['product_id'] = $id;
        $data['product_name'] = Product::find($id)->name_ar;
        return view('admin.products.show_sellers', $data);
    }

    public function add_seller(Request $request, $product_id) {

        $seller_count = Product_seller::where(['product_id' => $product_id, 'seller_id' => $request->seller_id])->count();
        if ($seller_count > 0)
            return redirect()->back()->with('error', 'هذا البائع مضاف مسبقا لهذا المنتج !');

        $this->validate($request, [
            'seller_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'guarantee' => 'required',
            'guarantee_en' => 'required',
            'delivery' => 'required',
            'delivery_en' => 'required'
        ]);
        $data = $request->all();
        $data['product_id'] = $product_id;
        Product_seller::create($data);
        return redirect()->back()->with('success', 'لقد تمت عملية  الاضافة بنجاح');
    }

    public function edit_seller($id) {
        $data['seller'] = Product_seller::find($id);
        $data['sellers'] = Seller::lists('trade_name', 'id');
        return view('admin.products.edit_seller', $data);
    }

    public function update_seller(Request $request, $id) {
        $seller_count = Product_seller::where(['product_id' => $product_id, 'seller_id' => $request->seller_id])->count();
        if ($seller_count > 0)
            return redirect()->back()->with('error', 'هذا البائع مضاف مسبقا لهذا المنتج !');

        $this->validate($request, [
            'seller_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'guarantee' => 'required',
            'guarantee_en' => 'required',
            'delivery' => 'required',
            'delivery_en' => 'required'
        ]);
        $data = $request->all();
        Product_seller::find($id)->update($data);
        return redirect()->back()->with('success', 'لقد تمت عملية  التعديل بنجاح');
    }

    public function delete_seller($id) {
        Product_seller::where('id', $id)->delete();
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف  بنجاح');
    }

}
