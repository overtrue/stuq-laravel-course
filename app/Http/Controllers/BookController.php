<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BookController extends Controller
{
    public function get($id)
    {
        return 'hello book.'.$id;
    }
}
