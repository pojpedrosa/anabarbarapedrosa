<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/livros', [BookController::class, 'index'])->name('books.index');
Route::get('/livros/{slug}', [BookController::class, 'show'])->name('books.show');

Route::get('/criticas', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/agenda', [EventController::class, 'index'])->name('events.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/sobre', [PageController::class, 'about'])->name('about');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');
Route::get('/privacidade', [PageController::class, 'privacy'])->name('privacy');
