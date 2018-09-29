<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product_colors;
use App\Section;
use App\Branch;
use App\Product;
use App\Product_images;
use App\Type;
use App\Brand;
use App\Color;
use App\Size;
use App\City;
use App\Offer;
use Cart;
use Session;
use App;

class GetDataController extends Controller {

    public function getBranches() {
        $branch_data = Branch::where('section_id', $_GET['id'])->get();
        echo json_encode($branch_data);
    }

    public function getTypes() {
        $type_data = Type::where('branch_id', $_GET['id'])->get();
        echo json_encode($type_data);
    }

    public function getBrands() {
        $brand_data = Brand::where('type_id', $_GET['id'])->get();
        echo json_encode($brand_data);
    }

    public function getColors() {
        $colors_data = Color::all();
        echo json_encode($colors_data);
    }

    public function getSizes() {
        $sizes_data = Size::all();
        echo json_encode($sizes_data);
    }

    public function getCities() {
        $cities_data = City::all();
        echo json_encode($cities_data);
    }

    public function deleteProductColor() {
        Product_colors::where('id', $_GET['product_color_id'])->delete();
        echo json_encode(['deleted' => 'ok']);
    }

    public function getProduct() {
        $data = array();
        $images = array();
        $product_data = Product::find($_GET['product_id']);
        $offer_data = Offer::find($_GET['offer_id']);
        $product_images = Product_images::where('product_id', $_GET['product_id'])->select('image')->get();
        foreach ($product_images as $row) {
            array_push($images, $row->image);
        }
        //$data['product_images'] = $product_images;
        $data['images'] = $images;
        $data['product_id'] = $product_data->id;
        $data['product_name_ar'] = $product_data->name_ar;
        $data['product_name_en'] = $product_data->name_en;
        $data['product_original_price'] = $product_data->original_price;
        $data['product_discount_price'] = $product_data->discount_price;
        $data['product_image'] = $product_data->image;
        $data['product_rate_count'] = App\Rating_product::where('product_id', $_GET['product_id'])->count();
        if ($offer_data) {
            $data['offer_name_ar'] = $offer_data->name_ar;
            $data['offer_name_en'] = $offer_data->name_en;
        }
        echo json_encode($data);
    }

    public function getChargeValue() {
        $city_id = $_GET['city_id'];
        $charge_value = City::find($city_id)->charge_value;
        session::set('charge_value', $charge_value);
        echo json_decode($charge_value);
        //  echo Cart::subtotal();
    }

}
