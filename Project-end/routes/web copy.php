<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/books', [BookController::class, 'index'])->name('books.index')->middleware('auth');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit')->middleware('auth');
Route::post('/books', [BookController::class, 'store'])->name('books.store')->middleware('auth');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update')->middleware('auth');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy')->middleware('auth');

Route::resource('authors', AuthorController::class)->middleware('auth');


require __DIR__ . '/auth.php';