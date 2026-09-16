<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->with('category')
            ->orderBy('title')
            ->paginate(4);

        return view('landing.index', compact('books'));
    }

    public function buku(): View
    {
        return $this->index();
    }

    public function landing(): View
    {
        return $this->index();
    }
}
