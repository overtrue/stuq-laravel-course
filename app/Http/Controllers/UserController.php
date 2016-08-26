<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function create()
    {
        return response()->view('user-create')->cookie('foo', 'bar', 45);
    }

    public function store(Request $request)
    {
        // if ($request->has('username')) {
        //     return 'Request has username';
        // } else {
        //     return 'Request has not username.';
        // }
        // dd($request->all());
        // dd($request->input('email'));
        // dd($request->input('name', '匿名用户'));
        // dd($request->username);
        // dd($request->input('extends.province'));
        // 只获取 用户名与邮箱
        // dd($request->only(['username', 'email']));
        // 排除某些字段
        // dd($request->except('email', 'extends.city'));
        // $request->flash();
        // dd($request->cookie('foo'));
        //
        $file = $request->file('avatar');

        // 获取 一个对象的方法列表
        // dd(get_class_methods($file));
        // dd($file->getClientOriginalName());
        // dd($file->path());
        // dd($file->extension());
        // dd($file->getSize());
        //
        // dd($file->store('images'));
        // dd($file->storeAs('images', 'abc.png', 'public'));

        return back()->withInput($request->except('extends.city'));
    }
}
