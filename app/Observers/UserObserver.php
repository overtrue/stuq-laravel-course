<?php
namespace App\Observers;

use App\User;
use Log;

class UserObserver
{
    /*...*/
    public function created(User $user)
    {
        Log::info("你好！{$user->name}, 欢迎加入 Laravel 课程。");
    }

    /*...*/
    public function deleting(User $user)
    {
        //
    }
}

