<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Admin\User;

class LoginController extends Controller
{
	/*public function __construct()
	{
		$this->validate = new AdminUserRequest;
	}*/

	public function login (Request $request)
	{
		if ($request->post()) {
			$validator = Validator::make($request->all(), [
	            'username' => 'required',
	            'password' => 'required',
	            'code' => 'required|captcha'
	        ], [
		        'username.required' => '用户名不能为空',
	            'password.required' => '密码不能为空',
	            'code.required' => '验证码不能为空',
	            'code.captcha' => '验证码不正确'
        	])->validate();
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
		return view('admin.login.index');
	}

	/**
	 * 废弃
	 */
	/*public function dologin(AdminUserRequest $request)
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
	}*/

	public function loginOut(Request $request)
	{
		$request->session()->flush();
		return redirect('/admin_index');
	}
}