<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class Landing extends Controller
{
    
    public function buku()
    {
        $books = Book::query()
            ->with('category')
            ->orderBy('title')
            ->paginate(4);

        return view('landing.index', compact('books'));
    }
}
