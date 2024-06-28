<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog', 
        'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->get()]);
});

Route::get('/posts/{post:slug}', function(Post $post) {
    return  view('post', ['title' => $post->title, 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    return  view('posts', ['title' => count($user->posts) . ' Articles by : ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    return  view('posts', ['title' => count($category->posts) . ' Articles in : ' . $category->name, 'posts' => $category->posts]);
});
