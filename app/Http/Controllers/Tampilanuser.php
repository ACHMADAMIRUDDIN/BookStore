<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $cartItems = Cart::where('user_id', Auth::id())->pluck('quantity', 'book_id')->toArray();
        $cartCount = array_sum($cartItems);

        return view('user.index', compact('books', 'cartItems', 'cartCount'));
    }

    public function buku(Request $request): View
    {
        return $this->index($request);
    }

    public function keranjang(Request $request): View
    {
        $carts = Cart::with(['book.category'])
            ->where('user_id', Auth::id())
            ->get();

        return view('user.keranjang.index', compact('carts'));
    }

    public function tambahKeranjang(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:book,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $quantity = (int) $request->input('quantity', 1);

        $cart = Cart::where('user_id', Auth::id())
            ->where('book_id', $request->book_id)
            ->first();

        if ($cart) {
            $cart->increment('quantity', $quantity);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke keranjang!');
    }

    public function detail(Book $book): View
    {
        $book->load('category');

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->first();

        $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');

        return view('user.detail', compact('book', 'cartItem', 'cartCount'));
    }

    public function kurangKeranjang(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        if ($cart->quantity > 1) {
            $cart->decrement('quantity', 1);

            return redirect()->back()->with('success', 'Jumlah buku berhasil dikurangi.');
        }

        $cart->delete();

        return redirect()->back()->with('success', 'Buku berhasil dihapus dari keranjang.');
    }

    public function tambahItemKeranjang(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->load('book');
        if ($cart->book && $cart->quantity >= $cart->book->stock) {
            return redirect()->back()->with('error', 'Jumlah buku tidak boleh melebihi stok yang tersedia.');
        }

        $cart->increment('quantity', 1);

        return redirect()->back()->with('success', 'Jumlah buku berhasil ditambahkan.');
    }

    public function hapusItemKeranjang(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()->back()->with('success', 'Buku berhasil dihapus dari keranjang.');
    }
}
