<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

// List Posts:
Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog Posts', 
        'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9),
    ]);
});
// Single Post:
Route::get('/posts/{post:slug}', function(Post $post) {
    return  view('post', ['title' => $post->title, 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    return  view('posts', ['title' => count($user->posts) . ' Articles by : ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    return  view('posts', ['title' => count($category->posts) . ' Articles in : ' . $category->name, 'posts' => $category->posts]);
});

// Breeze Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Welcome
Route::get('/welcome', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';