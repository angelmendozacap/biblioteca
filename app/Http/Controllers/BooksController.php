<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Book;

class BooksController extends Controller
{
    public function store(StoreBookRequest $request)
    {
        Book::create($request->all());
    }
    public function update(StoreBookRequest $request, Book $book)
    {
        $book->update($request->all());
    }
}