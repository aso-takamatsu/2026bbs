<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest; 

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('books.index', ['books' => $books]);
    }
    public function create()
    {
        return view('books.create');
    }

    public function store(BookRequest  $request)
    {
        $book = new Book();
        $book->title   = $request->input('title');
        $book->comment = $request->input('comment');
        $book->save();

        return redirect('/books');
    }
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', ['book' => $book]);
    }

    public function update(BookRequest  $request, $id)
    {
        $book = Book::find($id);
        $book->title   = $request->input('title');
        $book->comment = $request->input('comment');
        $book->save();

        return redirect('/books');
    }
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books');
    }

}
