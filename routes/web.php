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

Route::get('movie/detail/{id}', 'MovieController@detail');

Route::get('/home', function () {
    return view('welcome');
})->name('homepage');

// admin/
// admin/users
// admin/users/new
// admin/users/update
// ....
$options = [
    'prefix' => 'admin',
    'namespace' => 'Admin',
];

Route::bind('username', function($username){
    return App\User::where('name', $username)->first();
});

Route::group($options, function(){
    Route::get('/', function(){
        return 'admin dashbard';
    });

    Route::get('users', 'UserController@lists');
    Route::get('users/new', 'UserController@create');
    Route::get('users/{username}', 'UserController@get');
});


Route::get('loop', function() {
    $users = ['张三', '李四', '王五'];
    return view('loop', ['users' => $users]);
});

// resouce
Route::resource('photos', 'PhotoController');



// controller
Route::get('book/{id}', 'BookController@get');




Route::get('product-detail/{product_id}', function($productId){
    return "Product detail:
        <br> id: {$productId}
        <br> price: ￥6288
        <br>...
            ";
})->name('product.detail');

Route::get('product', function(){
    return "product name: <a href='".route('product.detail', ['product_id' => 23])."'>iPhone 7</a>
            <br>
            <a href='".route('homepage')."' >返回首页</a>
            ";
});

Route::get('user/{id}/{type?}', function($id, $type = 'women'){
    return "User: id is {$id}, type: {$type}";
});
