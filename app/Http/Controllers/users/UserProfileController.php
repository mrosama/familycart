<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\HomeController;
use App\Message;
use Redirect;
use Auth;
use Session;
use App\Country;
use Mail;
use App;
use Hash;
use App\Address;
use App\Newsletter;
use App\City;
use App\User;
use App\Order;
use App\Product;
use App\Order_product;

class UserProfileController extends \App\Http\Controllers\Controller {

    public function editProfile() {
        $data['lang'] = App::getLocale();
        $data['user'] = User::find(Auth::id());
        return view('users/profile/editProfile', $data);
    }

    public function updateProfile(UpdateProfileRequest $request) {
        $data = $request->all();
        $user = User::find(Auth::id());
        $data['group'] = '2';
        $user->update($data);
        return Redirect::back()->with('success', ' تم تحديث البيانات بنجاح');
    }

    public function showPurchases() {
        $data['lang'] = App::getLocale();
        $data['user'] = User::find(Auth::id());
        $data['orders'] = Order::orderBy('id', 'desc')->where('user_id', Auth::id())->where('status', 4)->get();

        return view('users/profile/showPurchases', $data);
    }

    public function showOrder() {
        $data['lang'] = App::getLocale();
        $data['user'] = User::find(Auth::id());
        $data['orders'] = Order::orderBy('id', 'desc')->where('user_id', Auth::id())->paginate(1);
        return view('users/profile/showOrders', $data);
    }

    public function orderPDF($id) {
        $pdf = App::make('snappy.pdf.wrapper');
        $data['order'] = Order::find($id);
        $pdf->loadView('users.profile.orderPDF', $data);
        return $pdf->inline();
    }

    public function orderPrint($id) {
        $data['lang'] = App::getLocale();
        $data['order'] = Order::find($id);
        return view('users/profile/orderPrint', $data);
    }

    public function changePassword(ChangePasswordRequest $request) {
        //compare the password that the user entered with the password in database
        $lang = App::getLocale();
        $user = User::find(Auth::id());
        if (!Hash::check($request->old_password, $user->password))
            if ($lang == 'en') {
                return Redirect::back()->with('global_r', 'The old password is incorrect!!');
            } else {
                return Redirect::back()->with('global_r', 'كلمة المرور القديمة غير صحيحة!!');
            }
        $data['password'] = Hash::make($request->password);
        $updated = $user->update($data);
        if ($updated) {
            if ($lang == 'en') {
                Mail::send('emails.changePassword', array('user' => $user, 'lang' => $lang), function($message) use($user) {
                    $message->to($user->email)->subject(' Maliki store | Password was successfully changed');
                });
                return Redirect::back()->with('global_s', 'Password was successfully changed');
            } else {
                Mail::send('emails.changePassword', array('user' => $user), function($message) use($user) {
                    $message->to($user->email)->subject(' متجر المالكي | تم تغيير كلمة المرور بنجاح');
                });
                return Redirect::back()->with('global_s', 'لقد تم تغيير كلة المرور بنجاح');
            }
        } else {
            if ($lang == 'en') {
                return Redirect::back()->with('global_r', 'An error occurred while changing the password');
            } else {
                return Redirect::back()->with('global_r', 'حدث خطأ اثناء تغيير كلمة المرور');
            }
        }
    }

    public function addresses() {
        $data['lang'] = App::getLocale();
        $data['addresses'] = Address::where('user_id', Auth::id())->get();
        if ($data['lang'] == 'en')
            $data['countries'] = Country::lists('name_en', 'id');
        else
            $data['countries'] = Country::lists('name_ar', 'id');
        return view('users.profile.addresses', $data);
    }

    public function create_address(Request $request) {
        $this->validate($request, [
            'type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'mobile' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Address::create($data);
        $data['lang'] = App::getLocale();
        if ($data['lang'] == 'ar')
            return Redirect::back()->with('success', 'شكرا لك تمت عملية الاضافة بنجاح');
        else
            return Redirect::back()->with('success', 'Thank you has successfully added');
    }

    public function delete_address($address_id) {
        $data['lang'] = App::getLocale();
        Address::find($address_id)->delete();
        if ($data['lang'] == 'ar')
            return Redirect::back()->with('success', 'شكرا لك تمت عملية الحذف بنجاح');
        else
            return Redirect::back()->with('success', 'Thank you has successfully deleted');
    }

    public function edit_address($address_id) {
        $data['lang'] = App::getLocale();
        $data['address'] = Address::find($address_id);
        if ($data['lang'] == 'en') {
            $data['countries'] = Country::lists('name_en', 'id');
            $data['cities'] = City::where('country_id', $data['address']->country_id)->lists('name_en', 'id');
        } else {
            $data['countries'] = Country::lists('name_ar', 'id');
            $data['cities'] = City::where('country_id', $data['address']->country_id)->lists('name_ar', 'id');
        }
        return view('users.profile.edit_address', $data);
    }

    public function update_address(Request $request, $id) {
        $this->validate($request, [
            'type' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'mobile' => 'required'
        ]);
        $data = $request->all();
        if ($request->get('default_shipping') == null)
            Address::find($id)->update(['default_shipping' => 0]);
        if ($request->get('default_billing') == null)
            Address::find($id)->update(['default_billing' => 0]);

        Address::find($id)->update($data);
        $data['lang'] = App::getLocale();
        if ($data['lang'] == 'ar')
            return Redirect::back()->with('success', 'شكرا لك تمت عملية التعديل بنجاح');
        else
            return Redirect::back()->with('success', 'Thank you has successfully edited');
    }

    public function newsletter() {
        $data['lang'] = App::getLocale();
        $data['email_exist'] = Newsletter::where('email', Auth::user()->email)->first();
        return view('users.profile.newsletter', $data);
    }

    public function update_newsletter(Request $request) {
        $lang = App::getLocale();
        $data['email'] = Auth::user()->email;
        if ($request->get('subscribe') == null) {
            Newsletter::where('email', Auth::user()->email)->delete();
            if ($lang == 'ar')
                return Redirect::back()->with('success', 'شكرا لك تم الغاء الاشتراك بنجاح');
            else
                return Redirect::back()->with('success', 'Thank you Successfully unsubscribed');
        } else {
            Newsletter::create($data);
            if ($lang == 'ar')
                return Redirect::back()->with('success', 'شكرا لك تم الاشتراك بنجاح');
            else
                return Redirect::back()->with('success', 'Thank you Successfully subscribed');
        }
    }

    public function createRating($order_id, $product_id) {
        $data['lang'] = App::getLocale();
        $data['product'] = \App\Product::find($product_id);
        $data['product_id'] = $product_id;
        $data['order_id'] = $order_id;
        $data['product_rate'] = App\Rating_product::where(['user_id' => Auth::id(), 'product_id' => $product_id, 'order_id' => $order_id])->first();
        return view('users.profile.productRate', $data);
    }

    public function saveRating(Request $request) {
        $lang = App::getLocale();
        $this->validate($request, [
            'star' => 'required',
            'rate_text' => 'required',
        ]);
        $data = $request->all();
        App\Rating_product::create($data);
        if ($lang == 'ar')
            return Redirect::to($lang . '/profile/myOrder')->with('success', 'شكرا لك تم التقييم بنجاح');
        else
            return Redirect::to($lang . '/profile/myOrder')->with('success', 'Thank you rated successfully');
    }

    public function productReturn() {
        $data['lang'] = App::getLocale();
        $order_id = $_GET['order_id'];
        $product_id = $_GET['product_id'];
        $data['order'] = Order::find($order_id);
        $data['order_product'] = Order_product::where(array('order_id' => $order_id, 'product_id' => $product_id))->first();
        return view('users.profile.productReturn', $data);
    }

    public function doProductReturn(Request $request) {
        $this->validate($request, [
            'causeFlashBacks' => 'required',
        ]);
        $data = $request->except('lang');
        $lang = $request->lang;
        if ($data['user_id'] != Auth::id()) {
            if ($lang == 'ar')
                return Redirect::back()->with('error', 'حدث خطأ يرجى مراجعة الادارة');
            else
                return Redirect::back()->with('error', 'Please review the error occurred administration');
        }
        App\productReturn::create($data);
        if ($lang == 'ar')
            return Redirect::to($lang . '/profile/myOrder')->with('success', 'شكرا لك سيتم متابعة عملية الارجاع من قبل الادارة');
        else
            return Redirect::to($lang . '/profile/myOrder')->with('success', 'Thank you will continue the process of Returns by admin');
    }

}
