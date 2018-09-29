<?php

namespace App\Http\Requests;

use App;
use App\Http\Requests\Request;

class RegitserationRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'theName' => 'required|min:2',
            'theEmail' => 'required|email|unique:users,email',
            'sex' => 'required|in:"male","female"',
            'password' => 'required|confirmed|min:6',
            'birthdate' => 'required|date',
            'privacy' => 'required',
        ];
    }

    public function messages() {
        if (App::getLocale() == 'en') {
            return [
                'theEmail.unique' => 'This email is already registered',
                'privacy.required' => ' Required ',
                'password.min' => 'Must be password at least six characters or numbers',
            ];
        }
        else
        {
            return [
            'theEmail.unique' => 'هذا الايميل مسجل مسبقا',
            'privacy.required' => ' مطلوب ادخاله',
            'password.min' => 'يجب ان تكون كلمة المرور على الاقل 6 احرف او ارقام',
        ];
        }
    }

}
