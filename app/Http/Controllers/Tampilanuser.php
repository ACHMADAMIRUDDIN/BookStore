<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Tampilanuser extends Controller
{
    public function index(Request $request): View
    {
        $books = Book::query()
            ->with('category')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            })
            ->orderBy('title')
            ->get();

        return view('user.index', compact('books'));
    }

    public function buku(Request $request): View
    {
        return $this->index($request);
    }
}
