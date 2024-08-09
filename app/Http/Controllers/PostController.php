<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title' => 'All Posts', 
            'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9),
        ]);
    }
    
    public function show(Post $post)
    {
        return view('post', [
            'title' => $post->title, 
            'post' => $post,
        ]);
    }

    public function author(User $user)
    {
        return  view('posts', [
            'title' => count($user->posts) . ' Posts by Author: ' . $user->name, 
            'posts' => $user->posts,
        ]);
    }

    public function category(Category $category)
    {
        return  view('posts', [
            'title' => count($category->posts) . ' Posts by Category: ' . $category->name, 
            'posts' => $category->posts,
        ]);
    }
}
