<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use View;
use Hash;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('auth')->only('create');
        // $this->middleware('auth')->except('lists', 'get');
    }

    public function lists()
    {
        return view('user-list');
    }

    public function get($user)
    {
        $description = '<h2>安正超</h2>，<p>性别：男</p>....';

        return view('user-profile')->withUser($user)
                                    ->withAge(18)
                                    ->withDescription($description)
                                    ->withPhoneNumber('18611688888');
    }

    public function create()
    {
        // $user = new User();
        // $user->name = 'overtrue';
        // $user->email = 'anzhengchao@gmail.com';
        // $user->password = Hash::make('123456abc');
        // $user->save();

        return 'user create form';
    }
}
