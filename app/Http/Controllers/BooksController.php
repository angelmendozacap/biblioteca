<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Book;

class BooksController extends Controller
{
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());
        return redirect($book->path());
    }
    public function update(StoreBookRequest $request, Book $book)
    {
        $book->update($request->all());
        return redirect($book->path());
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }
}