<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

class LoginMiddleware {
	public function handle($request, Closure $next)
    {
        //检测当前有没有登录的session信息
        if($request->session()->has('admin_user')){
            //执行下个请求
            return $next($request);
        }else{
            //跳转到登录界面
            return redirect()->route('adminLogin');
        }
    }
}