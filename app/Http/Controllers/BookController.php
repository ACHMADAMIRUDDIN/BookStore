<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->with('category')
            ->orderBy('title')
            ->paginate(10);

        return view('admin.books.index', compact('books'));
    }

    public function create(): View
    {
        $categories = Category::query()
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('admin.books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        Book::create($request->validated());
        

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book): View
    {
        $categories = Category::query()
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}