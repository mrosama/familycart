<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\VisitorLoginRequest;
use App\Http\Requests\RegitserationRequest;
use App\Http\Requests\forgetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Message;
use Redirect;
use Auth;
use Session;
use App\Country;
use Hash;
use App\City;
use App\User;
use Mail;
use App;
use Flash;

class UserController extends \App\Http\Controllers\Controller {

    public function showLogin() {
        $data['lang'] = App::getLocale();
        return view('users/login', $data);
    }

    public function doLogin(LoginRequest $request) {
        $lang = $request->lang;
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password, 'type' =>'user' , 'confirmed' => 1))) {
            if ($lang == 'en')
                Session::flash('success', 'Thank you ! You are logged in successfully you\'ll be redirected to the main page');
            else
                Session::flash('success', 'شكرا لك ! لقد تم تسجيل دخولك بنجاح سيتم تحويلك الى الصفحة الرئيسية');
            return Redirect::to('/' . $lang);
        } else
        if ($lang == 'en')
            return Redirect::back()->with('error', 'Please make sure your user name and password');
        else
            return Redirect::back()->with('error', 'يرجى التأكد من اسم المستخدم وكلمة المرور');
    }

    public function shippingLogin(LoginRequest $request) {
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password, 'confirmed' => 1))) {
            return Redirect::back();
        } else
        if ($lang == 'en')
            return Redirect::back()->with('error', 'Please make sure your user name and password');
        else
            return Redirect::back()->with('error', 'يرجى التأكد من اسم المستخدم وكلمة المرور');
    }

    public function doVisitorLogin(VisitorLoginRequest $request) {
        $lang = App::getLocale();
        $visitor_email = $request->email;
// check if exisit
        $check = User::where('email', $visitor_email)->get();
        if (count($check) == 0) {
            if ($lang == 'en')
                $name = "visitor";
            else
                $name = "زائر";
            $pass = str_random(10);
            $new_user = User::create([
                        'password' => Hash::make($pass),
                        'email' => $visitor_email,
                        'name' => $name,
                        'type' => 'user',
                        'image' => 'images/default.gif'
            ]);
            Auth::loginUsingId($new_user->id);
            Mail::send('users.signup_mail', array('pass' => $pass, 'email' => $new_user->email), function($message) use($new_user, $lang) {
                if ($lang == 'en')
                    $message->to($new_user->email)->subject(' Maliki Store | The register on the site successfully');
                else
                    $message->to($new_user->email)->subject(' متجر المالكي | تم التسجيل في الموقع بنجاح');
            });
            return Redirect::back();
        } else {
            if ($lang == 'en')
                return Redirect::back()->with('error', 'Email already exists');
            else
                return Redirect::back()->with('error', 'البريد الالكتروني موجود بالفعل ');
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::back();
    }

    public function getForgetPassword() {
        $data['lang'] = App::getLocale();
        return view('users/password/forgetPassword', $data);
    }

    public function forgetPassword(forgetPasswordRequest $request) {
        $lang = $request->lang;
        $email = $request->email;
        $user = User::where('email', $email)->first();
        $user->pass_code = str_random(30);
        $user->save();
        Session::put('email', $email);

        Mail::send('emails.forgetPassword', $data = ['pass_code' => $user->pass_code, 'user_name' => $user->username, 'email' => $email, 'lang' => $lang], function($message) use($email, $lang) {
            if ($lang == 'en') {
                $message->to($email)->subject('Maliki store | Change the password');
            } else {
                $message->to($email)->subject('متجر المالكي | تغيير كلمة المرور الخاصة ');
            }
        });

        if ($lang == 'en')
            return Redirect::back()->with('success', "It has been sent password modification to your e-mail data");
        else
            return Redirect::back()->with('success', "تم ارسال بيانات تعديل كلمة المرور على البريد الكتروني الخاص بك");
    }

    public function getResetPassword($pass_code) {
        $data['lang'] = App::getLocale();
        if (Session::get('email')) {
            if ($pass_code == User::where('email', Session::get('email'))->first()->pass_code) {
                return view('users/password/changePassword', $data);
            }
        }
        return view('emails.showErrorMsg', $data);
    }

    public function resetPassword(ResetPasswordRequest $request) {

        $lang = $request->lang;
        $user = User::where('email', Session::get('email'))->first();
        $user->password = Hash::make($request->password);
        $user->pass_code = null;
        $updated = $user->save();
        if ($updated) {
            Session::forget('email');
            if ($lang == 'en')
                return Redirect::to('/en/login')->with('success', 'Password has been changed successfully !! You can log in now');
            else
                return Redirect::to('/login')->with('success', 'لقد تم تغيير الباسوورد بنجاح!! يمكنك تسجيل الدخول الان');
        } else {
            if ($lang == 'en') {
                return Redirect::back()->with('resetError', 'An error occurred during the update');
            } else {
                return Redirect::back()->with('resetError', 'حدث خطأ اثناء التحديث');
            }
        }
    }

    public function showSignup() {
        $data['lang'] = App::getLocale();
        return view('users/signup', $data);
    }

    public function doSignup(RegitserationRequest $request) {
        $lang = App::getLocale();
        $data = $request->except('password_confirmation', 'theName', 'theEmail');
        $data['password'] = Hash::make($data['password']);
        $data['type'] = 'user';
        $data['image'] = 'images/default.gif';
        $data['name'] = $request->theName;
        $data['email'] = $request->theEmail;
        $confirmation_code = str_random(30);
        $data['confirmation_code'] = $confirmation_code;
        $new_user = User::create($data);

        $email = $data['email'];
        $name = $data['name'];
        \Mail::send('emails.verify', $data = ['email' => $email, 'name' => $name, 'confirmation_code' => $confirmation_code, 'lang' => $lang], function($message) use($data) {
            if ($data['lang'] == 'en')
                $message->to($data['email'])->subject('Verify your email address');
            else
                $message->to($data['email'])->subject('التحقق من عنوان البريد الإلكتروني الخاص بك');
        });

        if ($lang == 'en')
            return Redirect::to('en/login')->with('success', ' You have been successfully registered Please check your email to activate Data');
        else
            return Redirect::to('ar/login')->with('success', 'لقد تم تسجيلك بنجاح يرجى مراجعة الايميل الخاص بك لتفعيل التسجيل ');
    }

    public function confirm($confirmation_code) {
        $lang = App::getLocale();
        if (!$confirmation_code) {
            if ($lang == 'en')
                return Redirect::to('en/login')->with('error', 'Verification incorrect data');
            else
                return Redirect::to('ar/login')->with('error', 'بيانات التحقق او رابط التعفعيل غير صحيحة ');
        }
        $user = User::whereConfirmationCode($confirmation_code)->first();
        if (!$user) {
            if ($lang == 'en')
                return Redirect::to('en/login')->with('error', 'Verification incorrect data');
            else
                return Redirect::to('ar/login')->with('error', 'بيانات التحقق او رابط التعفعيل غير صحيحة ');
        }
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        if ($lang == 'en')
            return Redirect::to('en/login')->with('success', 'You have successfully verified your account');
        else
            return Redirect::to('ar/login')->with('success', 'تم التحقق من حسابك بنجاح بامكانك تسجيل الدخول');
    }

    public function getCity() {
        return [City::where('country_id', $_GET['id'])->get(), ''];
    }

}
