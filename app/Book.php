<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        // return route('books.update', ['book' => $this->id, 'slug' => Str::slug($this->title)]);
        return '/books/' . $this->id . '-' . $this->title;
    }
}