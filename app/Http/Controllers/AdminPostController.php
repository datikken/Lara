<?php
/**
 * Created by IntelliJ IDEA.
 * User: datikken
 * Date: 10.05.2020
 * Time: 19:13
 */

namespace App\Http\Controllers;
use App\Post;
use http\Env\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.blog.display', ['posts' => $posts]);
    }

    public function showCreateForm()
    {
        return view('admin.blog.create');
    }

    public function sendCreatePost(Request $request)
    {
        dump($request);
    }
}
