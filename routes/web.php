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

Route::get('/admin_login', "Admin\LoginController@login");
Route::post('/admin_dologin', "Admin\LoginController@dologin");

// Route::match(['get','post'], '/admin_login', "Admin\LoginController@login");

Route::group(['middleware'=>'login'], function () {
	
	Route::get('/admin_index', "Admin\IndexController@index");

	Route::get('admin_loginOut', "Admin\LoginController@loginOut");
});
