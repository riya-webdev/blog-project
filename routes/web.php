<?php
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::resource('/admin/blogs', AdminBlogController::class);
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);
Route::get('/', function () {
    return view('welcome');
});


