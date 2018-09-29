<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Order_product;
use App\Product_seller;
use App\Shipping;
use App\City;
use Cart;
use Auth;
use App;
use Session;
use URL;
use Redirect;

class CheckoutController extends Controller {

    public function pay(Request $request) {


        $lang = App::getLocale();
        $data = $request->all();
        if (Session::has('gift')) {

            if (Session::get('gift_text') == 'null') {
                $this->validate($request, [
                    'gift_text' => 'required'
                ]);
            }
        }
        $this->validate($request, [
            'payment_method' => 'required'
        ]);
        if ($request->payment_method == 'cash') {
            $this->validate($request, [
                'transfer_image' => 'required'
            ]);
            if ($request->hasFile('transfer_image')) {
                $imageName = str_random(30) . '.' . $request->file('transfer_image')->getClientOriginalExtension();
                $request->file('transfer_image')->move(
                        public_path() . '/images/transfer_image/', $imageName
                );
                $data['transfer_image'] = $imageName;
            }
        }


        $city_id = Shipping::find($request->get('shipping_id'))->city_id;
        $charge_value = City::find($city_id)->charge_value;
        $data['charge_value'] = $charge_value;
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'request_receipt';
        //$data['total_price'] = Cart::subtotal();
        $CartTotal = Cart::subtotal();
        $CartTotal = str_replace(',', '', $CartTotal);
        $data['total_price'] = $CartTotal;


        if (Session::has('gift')) {
            $data['gift'] = 1;
            $data['gift_text'] = Session::get('gift_text');
            Session::forget('gift');
        }
        if (Session::has('fastCharge')) {
            $data['fastCharge'] = 1;
            Session::forget('fastCharge');
        }
//        if (isset($charge_value) && !empty($charge_value)) {
//            $CartTotal = $CartTotal + $charge_value;
//        }




        $order_id = Order::create($data)->id;

        foreach (Cart::content() as $row) {
            $cart['order_id'] = $order_id;
            $cart['product_id'] = $row->id;
            $cart['qty'] = $row->qty;
            $cart['price'] = $row->price;
            $cart['name_ar'] = $row->name;
            $cart['name_en'] = $row->options->name_en;
            $cart['image'] = $row->options->image;
            if ($row->options->seller_id)
                $cart['seller_id'] = $row->options->seller_id;
            else
                $cart['seller_id'] = 0;
            if ($row->options->color_size_id)
                $cart['color_size_id'] = $row->options->color_size_id;
            else
                $cart['color_size_id'] = 0;

            Order_product::create($cart);
            if ($row->options->seller_id) {
                $product_seller = Product_seller::where([ 'seller_id' => $row->options->seller_id, 'product_id' => $row->id])->first();
                $product_qty = $product_seller->quantity - $row->qty;
                Product_seller::where([ 'seller_id' => $row->options->seller_id, 'product_id' => $row->id])->update(['quantity' => $product_qty]);
            } else if ($row->options->color_size_id) {
                $product_color_size = App\Product_colors_size::find($row->options->color_size_id);
                $product_qty = $product_color_size->quantity - $row->qty;
                App\Product_colors_size::find($row->options->color_size_id)->update(['quantity' => $product_qty]);
            } else {
                $product = Product::find($row->id);
                $product_qty = $product->quantity - $row->qty;
                Product::where('id', $row->id)->update(['quantity' => $product_qty]);
            }
        }
        Cart::destroy();

        \Mail::send('emails.paySuccess', $data = ['email' => Auth::user()->email, 'order_id' => $order_id, 'lang' => $lang], function($message) use($data) {
            if ($data['lang'] == 'en')
                $message->to($data['email'])->subject('Procurement process of  malky Store ');
            else
                $message->to($data['email'])->subject('عملية الشراء من متجر المالكي');
        });
        if ($data['lang'] == 'en')
            return redirect()->to('en/checkout/success');
        else
            return redirect()->to('ar/checkout/success');
    }

    public function success() {
        $data['lang'] = App::getLocale();
        return view('site.checkout_success', $data);
    }

}
