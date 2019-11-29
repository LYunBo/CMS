<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Login;
use Illuminate\Http\Request;

class LoginController extends Login {
	public function login ()
	{
		return view('admin.login.index');
	}

	public function dologin(Request $request)
	{
		$post = $request->except('_token');

		// dump($post);
		if (count($post) > 0) {
			return redirect('success')->with('/admin_index');
		} else {

		}
	}
}