<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('is_active', true)->orderBy('sort_order')->get();
        return view('books.index', compact('books'));
    }

    public function show(string $slug)
    {
        $book = Book::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $reviews = $book->reviews()->where('is_active', true)->orderBy('sort_order')->get();
        return view('books.show', compact('book', 'reviews'));
    }
}
