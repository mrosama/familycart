<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App;
use Session;
use Redirect;
use App\View;
use App\Section;
use App\Brand;
use App\Branch;
use App\Product;
use App\Product_images;
use App\Product_seller;
use App\Product_offers;
use App\Product_colors;
use App\Product_sizes;
use App\Rating_product;
use App\Product_advantages;
use App\Product_color_images;
use App\Product_colors_size;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller {

    public function Show($id) {

        // Get ip Address
        $ipAddress = '';
        // Check for X-Forwarded-For headers and use those if found
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ('' !== trim($_SERVER['HTTP_X_FORWARDED_FOR']))) {
            $ipAddress = trim($_SERVER['HTTP_X_FORWARDED_FOR']);
        } else {
            if (isset($_SERVER['REMOTE_ADDR']) && ('' !== trim($_SERVER['REMOTE_ADDR']))) {
                $ipAddress = trim($_SERVER['REMOTE_ADDR']);
            }
        }

        $data['lang'] = App::getLocale();
        $data['product'] = Product::find($id);
        if ($data['product'] != null) {
            // add product to recently watched
            $view_count = View::where(['ip' => $ipAddress, 'product_id' => $id])->count();
            if ($view_count == 0)
                View::create(['ip' => $ipAddress, 'product_id' => $id]);

            if (isset($_GET['color_size'])) {
                $data['color_size_data'] = App\Product_colors_size::find($_GET['color_size']);
                $data['product_color_images'] = Product_color_images::where('product_color_id', $_GET['color_size'])->get();
            }



            $data['product_rate_count'] = Rating_product::where('product_id', $id)->count();
            $data['product_sellers'] = Product_seller::where('product_id', $id)->get();
            $data['product_offer'] = Product_offers::where('product_id', $id)->first();
            $data['product_images'] = Product_images::where('product_id', $id)->get();
            $data['product_colors_sizes'] = Product_colors_size::where('product_id', $id)->get();
//            $data['product_colors'] = Product_colors::where('product_id', $id)->get();
//            $data['product_sizes'] = Product_sizes::where('product_id', $id)->get();
            $product_advantages = Product_advantages::where('product_id', $id)->get();
            $product_feature = array();
            foreach ($product_advantages as $row) {
                array_push($product_feature, $row->feature_id);
            }
            $data['product_feature_id'] = array_unique($product_feature);
            $data['similar_product'] = Product::where(['section_id' => $data['product']->section_id, 'branch_id' => $data['product']->branch_id, 'type_id' => $data['product']->type_id, 'brand_id' => $data['product']->brand_id])->inRandomOrder()->take(20)->get();
            return view('site.products.details', $data);
        } else {
            return view('site.products.notFound');
        }
    }

    public function ProductColor($product_id, $color_id) {
        $data['lang'] = App::getLocale();
        $data['product'] = Product::find($product_id);
        $data['product_color_data'] = Product_colors::find($color_id);
        $data['product_color_images'] = Product_color_images::where('product_color_id', $color_id)->get();
        $data['product_colors'] = Product_colors::where('product_id', $product_id)->get();
        $data['product_sizes'] = Product_sizes::where('product_id', $product_id)->get();
        $data['similar_product'] = Product::where(['section_id' => $data['product']->section_id, 'branch_id' => $data['product']->branch_id, 'type_id' => $data['product']->type_id, 'brand_id' => $data['product']->brand_id])->inRandomOrder()->take(20)->get();
        return view('site.products.details_color', $data);
    }

//    public function sections($section_id, $section_name = null) {
//        $querySearch = array();
////        $branchIDs = array();
////        $brandIDs = array();
////        if (isset($_GET['branchID'])) {
////            if (!in_array($_GET['branchID'], $branchIDs))
////                array_push($branchIDs, $_GET['branchID']);
////        }
//
//        if (isset($_GET['brandID'])) {
//            $_SESSION['brandIDs'][] = $_GET['brandID'];
//
////            if (!in_array($_GET['brandID'], $brandIDs))
////                array_prepend($brandIDs, $_GET['brandID']);
//        }
//        dd($_SESSION['brandIDs']);
//
//        $data['lang'] = App::getLocale();
//        $data['section'] = Section::find($section_id);
//        if ($data['section'] == null)
//            return Redirect::to('/' . $data['lang']);
//
//        $section_id = $data['section']->id;
//        $data['branches'] = Branch::where('section_id', $section_id)->get();
//
//        if (isset($_GET['branchID'])) {
//            $result = Product::where('branch_id', $_GET['branchID'])->get();
//            $brands = Brand::where('branch_id', $_GET['branchID'])->get();
//        } else {
//            $result = Product::where('section_id', $section_id)->get();
//            $brands = Brand::where('section_id', $section_id)->get();
//        }
//
//
//        $data['brands'] = $brands;
//        $data['result'] = $result;
//
//        return view('site.products.sections', $data);
//    }

    public function sections($section_id, $section_name) {
        $data['lang'] = App::getLocale();
        $products = App\Product::where('section_id', $section_id);
       
        $data['restUrl'] = $this->getCurrentRestUrl(\Request::fullUrl());
        $data['getBrands'] = $this->checkExsists($_GET, 'brand');
        $data['getColors'] = $this->checkExsists($_GET, 'color');
        $data['getPrices'] = $this->checkExsists($_GET, 'price');
        $data['getOffers'] = $this->checkExsists($_GET, 'offer');
        $data['getarrange'] = $this->getWord($_GET, 'arrange');
        $colors_arr = [];

        if (count($data['getBrands']) > 0)
            $products = $products->whereIn('brand_id', $data['getBrands']);
        if (count($data['getColors']) > 0)
            $products = $products->whereIn('color_id', $data['getColors']);
        if (count($data['getPrices']) > 0)
            $products = $products->whereBetween('discount_price', $data['getPrices']);

        if ($data['getarrange'] == "mShares")
            ;
        if ($data['getarrange'] == "newest")
            $products = $products->orderBy('id', 'desc');
        if ($data['getarrange'] == "lPrice")
            $products = $products->orderBy('discount_price', 'desc');
        if ($data['getarrange'] == "hPrice")
            $products = $products->orderBy('discount_price', 'asc');
        if ($data['getarrange'] == "discounts")
            $products = $products->where('original_price', '!=', '0');

        $data['products'] = $products->get();
        if (count($data['getOffers']) > 0) {
            $products = $data['products'];
            $data['products'] = [];
            foreach (Product_offers::whereIn('offer_id', $data['getOffers'])->get() as $offer) {
                foreach ($products as $product) {
                    if ($product->id == $offer->product_id)
                        array_push($data['products'], $product);
                }
            }
        }
        foreach (Product::all() as $product)
            $colors_arr[$product->id] = $product->color_id;

        $data['colors_arr'] = array_unique($colors_arr);
        $data['section'] = App\Section::find($section_id);

        return view('site.products.sections', $data);
    }

    public function types($type_id) {
        $data['lang'] = App::getLocale();
        $products = App\Product::where('type_id', $type_id);
        $data['restUrl'] = $this->getCurrentRestUrl(\Request::fullUrl());
        $data['getBrands'] = $this->checkExsists($_GET, 'brand');
        $data['getColors'] = $this->checkExsists($_GET, 'color');
        $data['getPrices'] = $this->checkExsists($_GET, 'price');
        $data['getOffers'] = $this->checkExsists($_GET, 'offer');
        $data['getarrange'] = $this->getWord($_GET, 'arrange');
        $colors_arr = [];
        if (count($data['getBrands']) > 0)
            $products = $products->whereIn('brand_id', $data['getBrands']);
        if (count($data['getColors']) > 0)
            $products = $products->whereIn('color_id', $data['getColors']);
        if (count($data['getPrices']) > 0)
            $products = $products->whereBetween('discount_price', $data['getPrices']);
        if ($data['getarrange'] == "mShares")
            ;
        if ($data['getarrange'] == "newest")
            $products = $products->orderBy('id', 'desc');
        if ($data['getarrange'] == "lPrice")
            $products = $products->orderBy('discount_price', 'desc');
        if ($data['getarrange'] == "hPrice")
            $products = $products->orderBy('discount_price', 'asc');
        if ($data['getarrange'] == "discounts")
            $products = $products->where('original_price', '!=', '0');
        $data['products'] = $products->get();
        if (count($data['getOffers']) > 0) {
            $products = $data['products'];
            $data['products'] = [];
            foreach (Product_offers::whereIn('offer_id', $data['getOffers'])->get() as $offer) {
                foreach ($products as $product) {
                    if ($product->id == $offer->product_id)
                        array_push($data['products'], $product);
                }
            }
        }
        foreach (Product::all() as $product)
            $colors_arr[$product->id] = $product->color_id;

        $data['colors_arr'] = array_unique($colors_arr);
        $data['type'] = App\Type::find($type_id);
        $data['section'] = App\Section::find($data['type']->section_id);
        return view('site.products.types', $data);
    }

    public function branches($branch_id, $branch_name) {
        $data['lang'] = App::getLocale();
        $products = App\Product::where('branch_id', $branch_id);
        $data['restUrl'] = $this->getCurrentRestUrl(\Request::fullUrl());
        $data['getBrands'] = $this->checkExsists($_GET, 'brand');
        $data['getColors'] = $this->checkExsists($_GET, 'color');
        $data['getPrices'] = $this->checkExsists($_GET, 'price');
        $data['getOffers'] = $this->checkExsists($_GET, 'offer');
        $data['getarrange'] = $this->getWord($_GET, 'arrange');
        $colors_arr = [];
        if (count($data['getBrands']) > 0)
            $products = $products->whereIn('brand_id', $data['getBrands']);
        if (count($data['getColors']) > 0)
            $products = $products->whereIn('color_id', $data['getColors']);
        if (count($data['getPrices']) > 0)
            $products = $products->whereBetween('discount_price', $data['getPrices']);
        if ($data['getarrange'] == "mShares")
            ;
        if ($data['getarrange'] == "newest")
            $products = $products->orderBy('id', 'desc');
        if ($data['getarrange'] == "lPrice")
            $products = $products->orderBy('discount_price', 'desc');
        if ($data['getarrange'] == "hPrice")
            $products = $products->orderBy('discount_price', 'asc');
        if ($data['getarrange'] == "discounts")
            $products = $products->where('original_price', '!=', '0');
        $data['products'] = $products->get();
        if (count($data['getOffers']) > 0) {
            $products = $data['products'];
            $data['products'] = [];
            foreach (Product_offers::whereIn('offer_id', $data['getOffers'])->get() as $offer) {
                foreach ($products as $product) {
                    if ($product->id == $offer->product_id)
                        array_push($data['products'], $product);
                }
            }
        }
        foreach (Product::all() as $product)
            $colors_arr[$product->id] = $product->color_id;

        $data['colors_arr'] = array_unique($colors_arr);
        $data['branch'] = App\Branch::find($branch_id);
        $data['section'] = App\Section::find($data['branch']->section_id);
        return view('site.products.branches', $data);
    }

    public function checkExsists($all, $name) {
        if (isset($all[$name]))
            return explode(',', $all[$name]);
        else
            return [];
    }

    public function getWord($all, $name) {
        if (isset($all[$name]))
            return $all[$name];
        else
            return "";
    }

    public function getCurrentRestUrl($currentUrl) {
        $restUrl = strstr($currentUrl, "?");
        $urls = explode("&", str_replace("?", "", $restUrl));
        $arr_url = [];

        foreach ($urls as $url) {
            $C_Url = str_replace("%2C", ",", $url);
            $C_Url = explode("=", $C_Url);

            if ($C_Url[0] != "")
                $arr_url[$C_Url[0]] = $C_Url[1];
        }

        return $arr_url;
    }

}
