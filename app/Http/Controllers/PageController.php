<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Event;
use App\Models\Page;
use App\Models\Post;
use App\Models\Review;

class PageController extends Controller
{
    public function home()
    {
        $featuredBooks = Book::where('is_active', true)->where('is_featured', true)->orderBy('sort_order')->get();
        $books = Book::where('is_active', true)->orderBy('sort_order')->limit(6)->get();
        $upcomingEvents = Event::where('is_active', true)->where('starts_at', '>=', now())->orderBy('starts_at')->limit(3)->get();
        $latestPosts = Post::where('is_active', true)->whereNotNull('published_at')->orderByDesc('published_at')->limit(3)->get();
        $reviews = Review::where('is_active', true)->orderBy('sort_order')->limit(4)->get();

        return view('home', compact('featuredBooks', 'books', 'upcomingEvents', 'latestPosts', 'reviews'));
    }

    public function about()
    {
        $page = Page::findByKey('sobre');
        return view('about', compact('page'));
    }

    public function contact()
    {
        $page = Page::findByKey('contacto');
        return view('contact', compact('page'));
    }

    public function privacy()
    {
        $page = Page::findByKey('privacidade');
        return view('privacy', compact('page'));
    }
}
