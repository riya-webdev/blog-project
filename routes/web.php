<?php
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AuthController;



Route::get('/admin/login', [AuthController::class, 'showLogin']);
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout']);

Route::middleware('admin')->group(function () {

    Route::get('/admin', [AdminBlogController::class, 'dashboard']);

    Route::get('/admin/home', [HomeController::class, 'index'])
        ->name('admin.home');

    Route::put('/admin/home/{section}', [HomeController::class, 'update'])
        ->name('admin.home.update');

    Route::resource('/admin/blogs', AdminBlogController::class);

});Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);
Route::get('/', function () {

    $blogs = \App\Models\Blog::where('status', 'published')
                             ->latest()
                             ->take(6)
                             ->get();

    $hero = \App\Models\HomeSection::where('section', 'hero')->first();

    $about = \App\Models\HomeSection::where('section', 'about')->first();

    return view('blogs.home', compact(
        'blogs',
        'hero',
        'about'
    ));
});


