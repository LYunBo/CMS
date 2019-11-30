<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	/*public function __construct()
	{
		$this->middleware('login');
	}*/

	public function login ()
	{
		session()->pull('admin_user');
		return view('admin.login.index');
	}

	public function dologin(Request $request)
	{
		dump($request->post());
		$post = $request->except('_token');

		// dump($post);
		if (count($post) > 0) {
			session(['admin_user'=>1]);
			return redirect('/admin_index')->with('success','登录成功');
		} else {

		}
	}
}