<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Book;
use App\Events\BookViewed;
use Event;

class BookController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('book.new')->with('categories', $categories);
    }

    public function view($id)
    {
        $book = Book::findOrFail($id);

        // 触发事件：有人查看了这本书
        Event::fire(new BookViewed($book));

        return view('book.show', compact('book')); //['book' => $book]
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('book.edit', compact('book', 'categories')); //['book' => $book]
    }

    public function delete($id)
    {
        Book::findOrFail($id)->delete();

        return redirect()->to('/');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:1|unique:books,title,'.$id, //
            'author' => 'required|min:2',
            'category_id' => 'required|integer',
            'cover' => 'file|image',
            'content' => 'required|min:10',
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->content = $request->content;

        // 上传封面
        if ($request->hasFile('cover')) {
            //
            $filename = $request->file('cover')->store('', 'cover');

            $book->cover = $filename;
        }

        $book->save();

        return redirect()->to(url('books/view/'.$id));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:1|unique:books,title',
            'author' => 'required|min:2',
            'category_id' => 'required|integer',
            'cover' => 'required|file|image',
            'content' => 'required|min:10',
        ];

        $this->validate($request, $rules);

        $book = new Book();

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->content = $request->content;

        // 上传封面
        //
        $filename = $request->file('cover')->store('', 'cover');

        $book->cover = $filename;

        $book->save();

        return redirect()->to('/');
    }

    public function trashed(Request $request)
    {
        if ($request->has('category')) {
            $books = Book::where('category_id', $request->category)->onlyTrashed()->paginate(15);
        } else {
            $books = Book::onlyTrashed()->paginate(15);
        }

        $categories = Category::all();

        return view('book.trashed')->with('books', $books)->with('categories', $categories);
    }

    public function restore($id)
    {
        $book = Book::withTrashed()->whereId($id);
        $book->restore();

        return back();
    }

    public function restoreAll()
    {
        Book::onlyTrashed()->restore();

        return back();
    }

    public function forceDelete($id)
    {
        $book = Book::withTrashed()->whereId($id)->forceDelete();

        return back();
    }

    public function cleanTrashed()
    {
        Book::onlyTrashed()->forceDelete();

        return back();
    }
}
