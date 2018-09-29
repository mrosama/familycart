<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UpdateProfileRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        $data = ['name' => 'required',
                    'image' => 'image',
                    'country' => 'required|exists:countries,id',
                    'city' => 'required|exists:cities,id',
                    'mobile' => 'required',
        ];

        $user = User::find($this->id);
        if ($this->email != $user->email)
            $data['email'] = 'required|unique:users,email';

        return $data;
    }

}
