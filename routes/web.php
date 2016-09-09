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

Route::get('query', function(){
    // $user = App\User::find(3);

    // return $user->posts;
    $users = App\User::with('posts', 'videos')->paginate(15);

    return view('users-with-posts', ['users' => $users]);
});

Route::get('pg', function(){
    $users = DB::table('users')->paginate(5);

    return view('users', ['users' => $users]);
});

Route::get('morphs', function(){
    // $comment = new App\Comment(['content' => '我喜欢这篇文章...']);

    // $post = App\Post::find(10);

    // dd($post->comments()->save($comment));
    //
    // $comment = new App\Comment(['content' => '这个视频真的 好赞啊！...']);

    // $video = App\Video::find(12);

    // dd($video->comments()->save($comment));
    // return App\Video::find(12)->comments;
    //
    // return App\Comment::find(1)->commentable;
    //
    //
    // $post = App\Post::find(1);

    // dd($post->tags()->attach([1, 2]));
    //
    // return App\Post::find(1)->tags;

    // $video = App\Video::find(5);

    // dd($video->tags()->attach([3, 2, 4]));

    // App\Video::find(5)->tags()->sync([1, 4]);
    //
    // return App\Video::find(5)->tags;
});

Route::get('db', function(){
    // return DB::table('users')->where('id', 1)->orWhere(function($query){
    //     $query->where('email', 'pziemann@example.org')->orWhere('remember_token', 'r62asXPJbp');
    // })->orderBy('id', 'desc')->get();
    // return DB::table('users')->skip(4)->take(5)->get();
    // return DB::table('users')->offset(4)->limit(5)->get();

    // $user = [
    //     'name' => 'overtrue',
    //     'email' => 'anzhengchao@gmail.com',
    //     'password' => bcrypt('123456'),
    // ];
    // $result = DB::table('users')->insert($user);
    // dd($result);
    //
    //
    //
    // $users = [
    //         [
    //             'name' => 'overtrue',
    //             'email' => 'anzhengchao@gmail.com',
    //             'password' => bcrypt('123456'),
    //         ],
    //         [
    //             'name' => 'overtrue1',
    //             'email' => 'anzhengchao1@gmail.com',
    //             'password' => bcrypt('123456'),
    //         ], [
    //             'name' => 'overtrue2',
    //             'email' => 'anzhengchao2@gmail.com',
    //             'password' => bcrypt('123456'),
    //         ],
    // ];

    // $result = DB::table('users')->insert($users);
    // dd($result);
    //
    // $user = [
    //     'name' => 'overtrue-demo',
    //     'email' => 'anzhengchao.demo@gmail.com',
    //     'password' => bcrypt('123456'),
    // ];
    // $result = DB::table('users')->insertGetId($user);
    // dd($result);
    //

    // dd(DB::table('users')->where('id', 25)->update(['name' => 'overtrue-name-updated']));
    dd(DB::table('users')->where('name', 'like', 'overtrue%')->delete());
});

// 展示表单页
Route::get('user/create', 'UserController@create');
// 接收POST过来的表单内容
Route::post('user/store', 'UserController@store');
Route::get('di', 'UserController@container');
