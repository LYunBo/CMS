<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/admin_login', "Admin\LoginController@login")->name('Admin.login');
Route::post('/admin_dologin', "Admin\LoginController@dologin");*/
Route::get('/admin', "Admin\IndexController@index")->middleware('login');
Route::prefix('admin')->group(function () {
	Route::match(['get','post'], '/login', "Admin\LoginController@login")->name('adminLogin');

	Route::group(['middleware'=>'login'], function () {
		
		Route::get('/index', "Admin\IndexController@index")->name('adminIndex');

		Route::get('/loginOut', "Admin\LoginController@loginOut");
	});
});
	
