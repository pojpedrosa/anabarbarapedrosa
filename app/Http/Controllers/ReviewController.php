<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('book')->where('is_active', true)->orderBy('sort_order')->paginate(12);
        $books = Book::where('is_active', true)->orderBy('title')->get();
        return view('reviews.index', compact('reviews', 'books'));
    }
}
