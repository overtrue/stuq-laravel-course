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
use Illuminate\Http\Request;

// Auth::loginUsingId(4);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/hello', function(Request $request){
    // Auth::user();
    return view('hello')->with('user', $request->user());
})->middleware('auth');

Route::get('admin', function() {
    if (Auth::attempt(['name' => 'overtrue', 'password' => 1234568])) {
        return '管理后台';
    }

    return '登录失败';
});
