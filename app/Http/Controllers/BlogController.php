<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\User;
use App\Like;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        foreach($posts as $post) {
           $likes = count(DB::table('likes')->where('post_id', $post['id'])->where('like', '>', 0 )->get());
           $dislikes = count(DB::table('likes')->where('post_id', $post['id'])->where('like', '<=', 0 )->get());

           $post['likes'] = $likes;
           $post['dislikes'] = $dislikes;

           $post['comments'] = count(DB::table('posts_comments')->where('post_id', $post['id'])->get());
        }


        return view('pages.blog.blog',['posts' => $posts]);
    }

    public function postDetails($id)
    {
        $post = Post::find($id);

        $likes = count(DB::table('likes')->where('post_id', $post['id'])->where('like', '>', 0 )->get());
        $dislikes = count(DB::table('likes')->where('post_id', $post['id'])->where('like', '<=', 0 )->get());

        $post['likes'] = $likes;
        $post['dislikes'] = $dislikes;
        $post['comments'] = DB::table('posts_comments')->where('post_id', $post['id'])->get();

        // foreach($post['comments'] as $com) {
        //     dump($com);
        // }

        if(is_null($post)) {
            return redirect('404');
        }

        return view('pages.blog.blog_post',['post' => $post]);
    }

    public function blogPostComment(Request $request)
    {
        Validator::make( $request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'postId' => 'required'
        ])->validate();

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        $postId = $request->postId;
        $userId = Auth::id();

        $arr = array(
            'post_id' => $postId,
            'user_id' => $userId,
            'content' => $message,
            'name' => $name,
            'email' => $email,
            'created_at' => \Carbon\Carbon::now()
        );

        DB::table('posts_comments')->insert($arr);

        return response()->json($arr);
    }

    public function like(Request $request, $id)
    {
        $post_id = $request['post_id'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);

        if(!$post) {
            return null;
        }

        $user_id = Auth::id();
        $user = User::find($user_id);

        $like = $user->likes()->where('post_id', $post_id)->first();
        if($like) {
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like) {
                $like->delete();
                return  null;
            }
        } else {
            $like = new Like();
        }

        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post_id;
        if($update) {
            $like->update();
        } else {
            $like->save();
        }

        $likes = count(DB::table('likes')->where('post_id', $post_id)->where('like', '>', 0 )->get());
        $dislikes = count(DB::table('likes')->where('post_id', $post_id)->where('like', '<=', 0 )->get());

        $arr = array(
            'likes' => $likes,
            'dislikes' => $dislikes
        );

        return response()->json($arr);
    }
}
