<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Seller;
use App\Product_seller;
use Cart;
use App;
use Session;
use Redirect;

class CartController extends Controller {
    /* old add to cart
      //    public function add_to_cart() {
      //        $product = Product::find($_GET['p_id']);
      //        if ($product->quantity > 0) {
      //            $i = 0;
      //            foreach (Cart::content() as $row) {
      //                // Check if exists
      //                if ($row->id == $_GET['p_id']) {
      //                    $i++;
      //                }
      //            }
      //            // Add To Cart only First Time
      //            if ($i == 0) {
      //                $product = Product::find($_GET['p_id']);
      //                Cart::add($product->id, $product->name_ar, 1, $product->discount_price, ['image' => $product->image, 'name_en' => $product->name_en, 'original_price' => $product->original_price]);
      //            }
      //            echo json_encode(Cart::content());
      //            return;
      //        } else {
      //            $lang = App::getLocale();
      //            if ($lang == 'ar')
      //                echo json_encode(['empty_qty_msg' => 'عفوا كمية هذا المنتج فارغة']);
      //            else
      //                echo json_encode(['empty_qty_msg' => 'Sorry quantity of this product is empty']);
      //            return;
      //        }
      //    }
     * */

    public function add_to_cart() {
        $lang = App::getLocale();
        $product = Product::find($_GET['p_id']);
        if ($product->quantity > 0) {
            $i = 0;
            foreach (Cart::content() as $row) {
                // Check if exists
                if ($row->id == $_GET['p_id']) {
                    // delete original product and put seller product
                    Cart::remove($row->rowId);
                    // Add To Cart only First Time
                    if ($i == 0) {
                        Cart::add($product->id, $product->name_ar, 1, $product->discount_price, ['image' => $product->image, 'name_en' => $product->name_en, 'original_price' => $product->original_price]);
                        $i++;
                    }
                }
            }
            // Add To Cart only First Time
            if ($i == 0) {
                $product = Product::find($_GET['p_id']);
                Cart::add($product->id, $product->name_ar, 1, $product->discount_price, ['image' => $product->image, 'name_en' => $product->name_en, 'original_price' => $product->original_price]);
            }
            echo json_encode(Cart::content());
            return;
        } else {
            if ($lang == 'en')
                echo json_encode(['empty_qty_msg' => 'Sorry quantity of this product is empty']);
            else
                echo json_encode(['empty_qty_msg' => 'عفوا كمية هذا المنتج فارغة']);
            return;
        }
    }

    public function addToColorCart() {
        $lang = App::getLocale();
        $product = Product::find($_GET['p_id']);
        $product_color_size = App\Product_colors_size::find($_GET['color_size_id']);
        if ($product_color_size->quantity > 0) {
            $i = 0;
            foreach (Cart::content() as $row) {
                // Check if exists
                if ($row->id == $_GET['p_id']) {
                    // delete original product and put seller product
                    if ($product->color_id != $product_color_size->color_id && $product->size != $product_color_size->size) {
                        // Add To Cart only First Time
                        if ($i == 0) {
                            Cart::add($product->id, $product->name_ar, 1, $product->discount_price, ['image' => $product->image, 'name_en' => $product->name_en, 'original_price' => $product->original_price, 'color_size_id' => $_GET['color_size_id']]);
                            $i++;
                        }
                    }
                }
            }
            // Add To Cart only First Time
            if ($i == 0) {
                Cart::add($product->id, $product->name_ar, 1, $product->discount_price, ['image' => $product->image, 'name_en' => $product->name_en, 'original_price' => $product->original_price, 'color_size_id' => $_GET['color_size_id']]);
            }
            echo json_encode(Cart::content());
            return;
        } else {
            if ($lang == 'en')
                echo json_encode(['empty_qty_msg' => 'Sorry quantity of this product is empty']);
            else
                echo json_encode(['empty_qty_msg' => 'عفوا كمية هذا المنتج فارغة']);
            return;
        }
    }

    public function add_to_seller_cart() {
        $lang = App::getLocale();
        $product = Product::find($_GET['p_id']);
        $seller = Seller::find($_GET['s_id']);
        $product_seller = Product_seller::where([ 'seller_id' => $_GET['s_id'], 'product_id' => $_GET['p_id']])->first();
        if ($product_seller->quantity > 0) {
            $i = 0;
            foreach (Cart::content() as $row) {
                // Check if exists
                if ($row->id == $_GET['p_id']) {
                    // delete original product and put seller product
                    Cart::remove($row->rowId);
                    // Add To Cart only First Time
                    if ($i == 0) {
                        Cart::add($product->id, $product->name_ar, 1, $product_seller->price, ['image' => $product->image, 'name_en' => $product->name_en, 'seller_id' => $product_seller->seller_id]);
                        $i++;
                    }
                }
            }
            // Add To Cart only First Time
            if ($i == 0) {
                Cart::add($product->id, $product->name_ar, 1, $product_seller->price, ['image' => $product->image, 'name_en' => $product->name_en, 'seller_id' => $product_seller->seller_id]);
            }
            echo json_encode(Cart::content());
            return;
        } else {
            if ($lang == 'en')
                echo json_encode(['empty_qty_msg' => 'Sorry quantity of this product is empty']);
            else
                echo json_encode(['empty_qty_msg' => 'عفوا كمية هذا المنتج فارغة']);
            return;
        }
    }

    public function show_cart() {

        $data['lang'] = App::getLocale();
        if ($data['lang'] == 'en')
            $data['title'] = 'Shopping Cart';
        else
            $data['title'] = 'سلة التسوق';

        $data['cart_content'] = Cart::content();
        return view('site.cart.show', $data);
    }

    public function remove_item($rowId) {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function updateQuantity() {
        $rowId = $_GET['rowId'];
        Cart::update($rowId, $_GET['qty']);
        // echo json_encode(Cart::content());
        return;
    }

    public function AddGiftToCart() {
        Session::set('gift', 20);
        $CartWithGift = Cart::subtotal();
        $CartWithGift = str_replace(',', '', $CartWithGift);
        if (Session::has('fastCharge'))
            $CartWithGift = (float) $CartWithGift + 20 + 20;
        else
            $CartWithGift = (float) $CartWithGift + 20;
        echo json_encode(['val' => $CartWithGift]);
        return;
    }

    public function RemoveGiftFromCart() {
        Session::forget('gift');
        $CartTotal = str_replace(',', '', Cart::subtotal());
        if (Session::has('fastCharge'))
            $CartWithGift = (float) $CartTotal + 20;
        else
            $CartWithGift = Cart::subtotal();
        echo json_encode(['val' => $CartWithGift]);
        return;
    }

    public function addFastChargeToCart() {
        Session::set('fastCharge', 20);
        $CartTotal = Cart::subtotal();
        $CartTotal = str_replace(',', '', $CartTotal);
        if (Session::has('gift'))
            $CartWithFastCharg = (float) $CartTotal + 20 + 20;
        else
            $CartWithFastCharg = (float) $CartTotal + 20;
        echo json_encode(['val' => $CartWithFastCharg]);
        return;
    }

    public function removeFastChargeFromCart() {
        Session::forget('fastCharge');
        $CartTotal = str_replace(',', '', Cart::subtotal());
        if (Session::has('gift'))
            $CartWithFastCharg = (float) $CartTotal + 20;
        else
            $CartWithFastCharg = Cart::subtotal();
        echo json_encode(['val' => $CartWithFastCharg]);
        return;
    }

    public function buy_now($product_id) {
        $lang = App::getLocale();
        $product = Product::find($product_id);
        if ($product->quantity > 0) {
            $i = 0;
            foreach (Cart::content() as $row) {
                // Check if exists
                if ($row->id == $product_id) {
                    $i++;
                }
            }
            // Add To Cart only First Time
            if ($i == 0) {
                $product = Product::find($product_id);
                Cart::add($product->id, $product->name_ar, 1, $product->discount_price, ['image' => $product->image, 'name_en' => $product->name_en, 'original_price' => $product->original_price]);
            }
            return redirect()->to($lang . '/cart');
        } else {
            if ($lang == 'ar')
                return redirect()->back()->with('empty_qty_msg', 'عفوا كمية هذا المنتج فارغة');
            else
                return redirect()->back()->with('empty_qty_msg', 'Sorry quantity of this product is empty');
        }
    }

}
