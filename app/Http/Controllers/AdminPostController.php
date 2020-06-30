<?php
/**
 * Created by IntelliJ IDEA.
 * User: datikken
 * Date: 10.05.2020
 * Time: 19:13
 */

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $category = $request->input('category');
        $heading = $request->input('heading');
        $description = $request->input('description');
        $author = $request->input('author');
        $content = $request->input('content');

        $arr = array(
            'category' => $category,
            'heading' => $heading,
            'description' => $description,
            'author' => $author,
            'content' => $content,
            'created_at' => \Carbon\Carbon::now()
        );

        $post = new Post($arr);
        $post->save();

        return redirect()->route('adminDisplayBlog');
    }

    public function updatePost(Request $request, $id)
    {
        $category = $request->input('category');
        $heading = $request->input('heading');
        $description = $request->input('description');
        $author = $request->input('author');
        $content = $request->input('content');

        $arr = array(
            'category' => $category,
            'heading' => $heading,
            'description' => $description,
            'author' => $author,
            'content' => $content,
            'created_at' => \Carbon\Carbon::now()
        );

        $post = Post::where('id', $id)->update($arr);

        return redirect()->route('adminDisplayBlog');
    }

    public function savePostImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/' . $filenametostore);
            $msg = 'Изображение успешно загруженно';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function deletePost($id)
    {
        Post::destroy($id);
        return redirect()->route('adminDisplayBlog');
    }

    public function editPost($id)
    {
        $post = Post::find($id);

        return view('admin.blog.edit', ['post' => $post, 'id' => $post['id']]);
    }

}
