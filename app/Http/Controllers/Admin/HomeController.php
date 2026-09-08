<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HomeSection::where('section', 'hero')->first();
        $about = HomeSection::where('section', 'about')->first();

        return view('admin.home.index', compact('hero', 'about'));
    }

    public function update(Request $request, string $section)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $homeSection = HomeSection::firstOrCreate([
            'section' => $section,
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('home', 'public');
            $validated['image'] = $imagePath;
        }

        $homeSection->update($validated);

        return back()->with('success', ucfirst($section) . ' section updated successfully!');
    }
}