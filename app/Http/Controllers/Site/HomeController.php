<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App;
use App\View;
use App\Product;
use App\Brand;
use App\Newsletter;
use App\Slider;
use App\Support;
use App\SupportQuestion;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class HomeController extends Controller {

    public function index() {
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
        // get product  recently watched
        $view_count = View::where(['ip' => $ipAddress])->count();
        
        if ($view_count > 0) {
            $data['product_view'] = View::where('ip', $ipAddress)->get();
            $similar_product_id = View::where('ip', $ipAddress)->orderByRaw("RAND()")->first()->product_id;
            $similar_type_id = Product::find($similar_product_id)->type_id;
            $data['similar_product_view'] = Product::where('type_id', $similar_type_id)->get();
        }

        $data['lang'] = App::getLocale();
        $data['sections'] = App\Section::get();
        $data['sliders'] = Slider::where('place', 'home')->get();
        $data['first_section'] = $data['sections']->where('status', 1)->get(0);
        if ($data['first_section'])
            $data['first_products'] = App\Product::where('section_id', $data['first_section']->id)->take(20)->get();

        $data['second_section'] = $data['sections']->where('status', 1)->get(1);
        if ($data['second_section'])
            $data['second_products'] = App\Product::where('section_id', $data['second_section']->id)->take(20)->get();

        $data['third_section'] = $data['sections']->where('status', 1)->get(2);
        if ($data['third_section'])
            $data['third_products'] = App\Product::where('section_id', $data['third_section']->id)->take(4)->get();

        $data['fourth_section'] = $data['sections']->where('status', 1)->get(3);
        if ($data['fourth_section'])
            $data['fourth_products'] = App\Product::where('section_id', $data['fourth_section']->id)->take(20)->get();

        $data['five_section'] = $data['sections']->where('status', 1)->get(4);
        if ($data['five_section'])
            $data['five_products'] = App\Product::where('section_id', $data['five_section']->id)->take(4)->get();

        $data['six_section'] = $data['sections']->where('status', 1)->get(5);
        if ($data['six_section'])
            $data['six_products'] = App\Product::where('section_id', $data['six_section']->id)->take(20)->get();
        return view('site.home', $data);
    }

    public function changeLang($lang) {
        $url = $_GET['url'];
        $url = substr($url, 2);
        $redirectUrl = $lang . $url;
        return Redirect::to($redirectUrl);
    }

    public function search(Request $request) {
        $data['lang'] = App::getLocale();
        $key = $request->get('q');
        if (empty($key)) {
            $data['products'] = Product::all();
        } else {
            if ($data['lang'] == 'en')
                $data['products'] = Product::where('name_en', 'like', '%' . $key . '%')->get();
            else
                $data['products'] = Product::where('name_ar', 'like', '%' . $key . '%')->get();
        }
        return view('site.search', $data);
    }

    public function newsletter(Request $request) {
        $lang = App::getLocale();
        $data = $request->all();
        if ($request->get('email')) {
            $email_exist = Newsletter::where('email', $request->get('email'))->get();
            if (count($email_exist) > 0) {
                if ($lang == 'ar')
                    return Redirect::back()->with('newsletter_msg', 'البريد الالكتروني الذي ادخلته موجود بالفعل');
                else
                    return Redirect::back()->with('newsletter_msg', 'Email address you\'ve entered already exists');
            }
            else {
                Newsletter::create($data);

                \Mail::send('emails.subscribeSuccess', $data = ['email' => $request->get('email'), 'lang' => $lang], function($message) use($data) {
                    $message->to($data['email'])->subject('Procurement process of  malky Store ');
                    if ($data['lang'] == 'en')
                        $message->to($data['email'])->subject('Subscribe to the mailing list ');
                    else
                        $message->to($data['email'])->subject('الاشتراك في القائمة البريدية');
                });

                if ($lang == 'ar')
                    return Redirect::back()->with('newsletter_msg', 'شكرا لك تم الاشتراك بنجاح');
                else
                    return Redirect::back()->with('newsletter_msg', 'Thank you Successfully subscribed');
            }
        } else {
            return Redirect::back();
        }
    }

    public function all_categories() {
        $data['lang'] = App::getLocale();
        return view('site.all_categories', $data);
    }

    public function privacy() {
        $data['lang'] = App::getLocale();
        return view('site.privacy', $data);
    }

    public function contactUs() {
        $data['lang'] = App::getLocale();
        $data['setting'] = \App\Setting::first();
        return view('site.contactUs', $data);
    }

    public function sendMsg(Request $request) {

        $lang = App::getLocale();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'msg' => 'required'
        ]);
        App\Contact::create($request->all());
        if ($lang == 'en')
            return Redirect()->back()->with('success', 'Message Sent Successfully');
        else
            return Redirect()->back()->with('success', 'لقد تم ارسال الرسالة بنجاح');
    }

    public function supports() {
        $data['lang'] = App::getLocale();
        $data['supports'] = Support::all();
        return view('site.supports.show', $data);
    }

    public function supportQuestion($id) {
        $data['lang'] = App::getLocale();
        $data['supportQuestion'] = SupportQuestion::find($id);
        $sectionID = $data['supportQuestion']->sectionID;
        $data['support'] = Support::find($sectionID);
        $data['relatedQuestion'] = SupportQuestion::where('sectionID', $sectionID)->take(15)->get();
        return view('site.supports.question', $data);
    }

    public function supportSection($id) {
        $data['lang'] = App::getLocale();
        $data['support'] = Support::find($id);
        $data['supportQuestion'] = SupportQuestion::where('sectionID', $id)->get();
        return view('site.supports.all', $data);
    }

    public function supportSearch(Request $request) {
        $search_value = $request->get('search_value');
        $data['lang'] = App::getLocale();

        $data['result'] = SupportQuestion::where('details', 'LIKE', '%' . $search_value . '%')->get();

        $data['result_count'] = SupportQuestion::where('details', 'LIKE', '%' . $search_value . '%')->count();
        $data['search_value'] = $search_value;
        return view('site.supports.result', $data);
    }

}
