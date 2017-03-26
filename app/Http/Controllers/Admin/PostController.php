<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $blogPosts = Post::all();

        return view('admin.posts.home');
    }

    public function update($postId)
    {

    }

    public function edit($postId)
    {

    }

    public function destroy($postId)
    {

    }
}