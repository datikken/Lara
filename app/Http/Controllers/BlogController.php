<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('pages.blog.blog',['posts' => $posts]);
    }

    public function postDetails($id)
    {
        $post = Post::find($id);
        return view('pages.blog.blog_post',['post' => $post]);
    }
}
