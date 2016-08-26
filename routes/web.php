<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test/request', function(){
    dd(Request::get('name'));
});
// 展示表单页
Route::get('user/create', 'UserController@create');
// 接收POST过来的表单内容
Route::post('user/store', 'UserController@store');