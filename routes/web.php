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

Route::get('/', 'HomeController@index');

Route::group(['prefix' => '/books'], function(){
    Route::get('new', 'BookController@create');
    Route::post('store', 'BookController@store');
    Route::post('update/{id}', 'BookController@update');
    Route::get('view/{id}', 'BookController@view');
    Route::get('edit/{id}', 'BookController@edit');
    Route::get('delete/{id}', 'BookController@delete');

    Route::get('/trashed', 'BookController@trashed');
    Route::get('/restore/{id}', 'BookController@restore');
    Route::get('/restore-all', 'BookController@restoreAll');
    Route::get('/force-delete/{id}', 'BookController@forceDelete');
    Route::get('/clean-trashed', 'BookController@cleanTrashed');
});

Auth::routes();
