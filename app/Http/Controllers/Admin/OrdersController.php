<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Order_product;

class OrdersController extends Controller {

    public function index() {
        $data['orders'] = Order::all();
        return view('admin.orders.index', $data);
    }

    public function show($order_id) {
        $data['order'] = Order::find($order_id);
        $data['order_products'] = Order_product::where('order_id', $order_id)->get();
        return view('admin.orders.show', $data);
    }

    public function status($order_id) {
        $data['order'] = Order::find($order_id);
        return view('admin.orders.status', $data);
    }

    public function edit_status(Request $request, $order_id) {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $data['status'] = $request->get('status');
        Order::find($order_id)->update($data);
        return redirect()->back()->with('success', 'تم تعديل الحالة بنجاح');
    }

    public function delete($order_id) {
        Order::find($order_id)->delete();
        Order_product::where('order_id', $order_id)->delete();
        return redirect()->back()->with('success', 'تم  الحذف بنجاح');
    }

}
