<?php

namespace App\Http\Controllers;

use App;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create()
    {
        return response()->view('user-create')->cookie('foo', 'bar', 45);
    }

    public function container()
    {
        // App::find('user', function(){
        //      echo 'making user.';
        //      return new User();
        // });
        App::singleton('user', function(){
            echo 'making user.';
            return new User();
        });

        app('user');

        // App::make('user');
        // App::make('user');
        // App::make('user');
        // App::make('user');
        // App::make('user');
        //
        // $user = new User();

        // App::instance('user', $user);

        // dd(App::make('user'));


        return 'this is container method.';
    }

    public function store()
    {
        $rules = [
            'username' => 'required',
            'email' => 'required|email',
            'avatar' => 'required',
        ];
        // $messages = [
        //     'required' => ':attribute 必填哦！'
        // ];

        // $messages = [
        //     'username.required' => '你都不填写用户名，我怎么找到你呢？'
        // ];

        // $this->validate($request, $rules, $messages);
        $this->validate($this->request, $rules);

        return 'user created.';
    }
}
