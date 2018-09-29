<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\User;
use Mail;

class ProfileController extends Controller {

    public function showLogin() {
        return view('admin.profile.login');
    }

    public function doLogin(Request $request) {
        $this->validate($request, ['email' => 'required', 'password' => 'required']);
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password, 'type' => 'admin'))) {
            return Redirect::to('/admin/home');
        } else {
            return Redirect::back()->with('error', 'يرجى التأكد من  البريد الالكتروني  وكلمة المرور');
        }
    }

    public function editProfile() {
        $data['admin'] = Auth::user();
        return view('admin.profile.editProfile', $data);
    }

    public function updateProfile(Request $request) {
        $this->validate($request, ['name' => 'required', 'email' => 'required']);
                //dd($request->all());

        $data = $request->all();
        $user = User::find(Auth::id());
        $user->update($data);
        return Redirect::back()->with('success', ' تم تحديث البيانات بنجاح');
    }

    public function updatePassword(ChangePasswordRequest $request) {
        $user = User::find(Auth::id());
        if (!Hash::check($request->old_password, $user->password))
            return Redirect::back()->with('error', 'كلمة المرور القديمة غير صحيحة!!');
        $data['password'] = Hash::make($request->password);
        $updated = $user->update($data);
        if ($updated) {
            Mail::send('emails.changePassword', array('user' => $user), function($message) use($user) {
                $message->to($user->email)->subject(' العربة العائلية| تم تغيير كلمة المرور بنجاح');
            });
            return Redirect::back()->with('success', 'لقد تم تغيير كلة المرور بنجاح');
        } else {
                return Redirect::back()->with('error', 'حدث خطأ اثناء تغيير كلمة المرور');
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::back();
    }

}
