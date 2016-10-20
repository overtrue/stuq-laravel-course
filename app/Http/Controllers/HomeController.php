<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('category')) {
            $books = Book::where('category_id', $request->category)->paginate(15);
        } else {
            $books = Book::paginate(15);
        }

        $categories = Category::all();

        return view('home')->with('books', $books)->with('categories', $categories);
    }
}
