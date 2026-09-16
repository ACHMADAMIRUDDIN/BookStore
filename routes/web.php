<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfileController::class, 'landing'])->name('landing');

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


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('admin.index');

    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.index');
    })->name('user.index');
});

Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('books', BookController::class)->middleware('auth');


require __DIR__.'/auth.php';
