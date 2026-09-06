<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

public function create()
{
    return view('admin.blogs.create');
}

   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:blogs,slug',
        'short_description' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'author' => 'required|string|max:255',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('blogs', 'public');

        $validated['image'] = $imagePath;
    }

    $validated['status'] = 'published';

    Blog::create($validated);

    return redirect()
        ->route('blogs.index')
        ->with('success', 'Blog published successfully!');
}

    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', compact('blog'));
    }

public function update(Request $request, string $id)
{
    $blog = Blog::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:blogs,slug,' . $id,
        'short_description' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'author' => 'required|string|max:255',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('blogs', 'public');

        $validated['image'] = $imagePath;
    }

    $blog->update($validated);

    return redirect()
        ->route('blogs.index')
        ->with('success', 'Blog updated successfully!');
}

  public function destroy(string $id)
{
    $blog = Blog::findOrFail($id);

    $blog->delete();

    return redirect()
        ->route('blogs.index')
        ->with('success', 'Blog deleted successfully!');
}
}