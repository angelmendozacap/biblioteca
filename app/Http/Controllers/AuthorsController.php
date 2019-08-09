<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\StoreAuthorRequest;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->all());
    }
}
