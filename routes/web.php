<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Tampilanuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/dashboard', function (Request $request) {
    if ($request->user()->role === 'admin') {
        return redirect()->route('admin.index');
    }

    return redirect()->route('user.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('admin.index');

    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [Tampilanuser::class, 'index'])->name('user.index');
    Route::get('/user/books/{book}', [Tampilanuser::class, 'detail'])->name('user.books.detail');
    Route::get('/user/keranjang', [Tampilanuser::class, 'keranjang'])->name('user.keranjang.index');
    Route::post('/user/keranjang', [Tampilanuser::class, 'tambahKeranjang'])->name('user.keranjang.store');
    Route::patch('/user/keranjang/{cart}/kurang', [Tampilanuser::class, 'kurangKeranjang'])->name('user.keranjang.kurang');
    Route::patch('/user/keranjang/{cart}/tambah', [Tampilanuser::class, 'tambahItemKeranjang'])->name('user.keranjang.tambah');
    Route::delete('/user/keranjang/{cart}', [Tampilanuser::class, 'hapusItemKeranjang'])->name('user.keranjang.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/landing', [LandingController::class, 'buku'])->name('landing.index');
});

Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('books', BookController::class)->middleware('auth');

require __DIR__.'/auth.php';
