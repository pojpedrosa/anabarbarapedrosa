<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_active', true)->whereNotNull('published_at')->orderByDesc('published_at')->paginate(9);
        return view('blog.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->where('is_active', true)->firstOrFail();

        if ($post->isArticle() && $post->external_url) {
            return redirect()->away($post->external_url);
        }

        $related = Post::where('is_active', true)->whereNotNull('published_at')->where('id', '!=', $post->id)->orderByDesc('published_at')->limit(3)->get();
        return view('blog.show', compact('post', 'related'));
    }
}
