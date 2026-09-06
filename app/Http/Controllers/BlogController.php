<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')
                     ->latest()
                     ->get();

        return view('blogs.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
                     ->where('status', 'published')
                     ->firstOrFail();

        return view('blogs.show', compact('blog'));
    }
}