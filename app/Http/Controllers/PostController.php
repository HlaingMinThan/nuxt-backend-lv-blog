<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function userPosts()
    {
        return auth()->user()->posts;
    }

    public function index()
    {
        return Post::with('user')->latest()->get();
    }

    public function show(Post $post)
    {
        return $post->load('user');
    }

    public function store()
    {
        $cleanData = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $cleanData['user_id'] = auth()->id(); // need to update

        $post = Post::create($cleanData);

        return $post;
    }
}
