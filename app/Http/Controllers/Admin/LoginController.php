<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Login;

class LoginController extends Login {
	public function login ()
	{
		return view('admin.login.login');
	}
}