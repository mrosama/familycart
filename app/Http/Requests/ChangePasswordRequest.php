<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;

class ChangePasswordRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
		'old_password'=>'required',
		'password'=>'required|min:6|confirmed',
		'password_confirmation'=>'required|min:6',
		];
	}

}
