<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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

        $cleanData['user_id'] = 1; // need to update

        $post = Post::create($cleanData);

        return $post;
    }
}
