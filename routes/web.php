<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

// Listing Posts:
Route::get('/posts', [ PostController::class, 'index' ]);
// Single Post:
Route::get('/posts/{post:slug}', [ PostController::class, 'show' ]);
// Posts by Author:
Route::get('/authors/{user:username}', [ PostController::class, 'author.posts' ]);
// Posts by Category:
Route::get('/categories/{category:slug}', [ PostController::class, 'category.posts' ]);

// Admin Dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/admin/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin Posts
Route::get('/admin/posts', function () {
    return view('admin.posts');
})->middleware(['auth', 'verified'])->name('admin.posts');
// Admin Categories
Route::get('/admin/categories', function () {
    return view('admin.categories');
})->middleware(['auth', 'verified'])->name('admin.categories');
// Admin Media
Route::get('/admin/media', function () {
    return view('admin.media');
})->middleware(['auth', 'verified'])->name('admin.media');
// Admin Users
Route::get('/admin/users', function () {
    return view('admin.users');
})->middleware(['auth', 'verified'])->name('admin.users');

require __DIR__.'/auth.php';