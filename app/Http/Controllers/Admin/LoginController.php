<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use Illuminate\Http\Request;
use App\Admin\User;

class LoginController extends Controller
{
	/*public function __construct()
	{
		$this->middleware('login');
	}*/

	public function login ()
	{
		return view('admin.login.index');
	}

	public function dologin(AdminUserRequest $request)
	{
		$post = $request->except('_token');

		if (count($post) > 0) {
			$user = User::where('username', $post['username'])->first();
			if ($user) {
				if ($user['password'] != md5($post['password'])) {
					return back()->with('error', '请填写对应的用户名及密码');
				}
				session(['admin_user'=>md5($user['id'].$user['username']), 'adminUser'=>$user['username']]);
				return redirect('/admin_index')->with('success', '登录成功');
			} else {
				return back()->with('error', '请填写对应的用户名及密码');
			}
		} else {
			return back()->with('error', '非法操作！');
		}
	}

	public function loginOut(Request $request)
	{
		$request->session()->flush();
		return redirect('/admin_index');
	}
}