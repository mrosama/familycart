<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use File;

class UsersController extends Controller {

    public function index() {
        $data['users'] = User::all();
        return view('admin.users.index', $data);
    }

    public function getUsers() {
        $data['users'] = User::where('type', 'user')->get();
        return view('admin.users.index', $data);
    }

    public function getAdmins() {
        $data['users'] = User::where('type', 'admin')->get();
        return view('admin.users.index', $data);
    }

    public function create() {
        return View('admin.users.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'sex' => 'required'
        ]);
        $data = $request->all();

        //upload image
        $file = $request->file('image');
        $path = 'images/users';
        if ($file != NULL) {
            $destinationPath = public_path() . '/' . $path . '/';
            $fileName = str_random(20) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $data['image'] = $path . '/' . $fileName;
        }


        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية الاضافة بنجاح');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $data['user'] = User::findOrFail($id);
        return view('admin.users.edit', $data);
    }

    public function update(Request $request, $id) {

        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'sex' => 'required'
        ]);
        $data = $request->all();
        $file = $request->file('image');
        $path = 'images/users';
        $image = $user->image;

        if ($request->file('image') != NULL) {
            File::delete(public_path() . '/' . $image);
            $destinationPath = public_path() . '/' . $path . '/';
            $fileName = str_random(20) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $fileName);
            $data['image'] = $path . '/' . $fileName;
        }
        $user->fill($data)->save();
        return redirect()->back()->with('success', 'شكرا لك لقد تمت عملية التعديل بنجاح ');
    }

    public function updatePassword(Request $request, $id) {
        $user = User::find($id);

        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $data['password'] = \Hash::make($request->password);
        $user->update($data);
        return redirect()->back()->with('success', 'لقد تم تعديل كلمة المرور بنجاح!!');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        File::delete(public_path() . '/' . $user->image);
        return redirect()->back()->with('success', 'لقد تمت عملية الحذف بنجاح');
    }

}
