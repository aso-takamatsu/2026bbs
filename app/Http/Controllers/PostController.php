<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(PostRequest $request)
    {

        $post = new Post();
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/posts')->with('message', '投稿を保存しました！');
        // return redirect('/posts')->with('message', '「' . $post->title . '」を保存しました！');

    }
    public function edit($id)
    {
        $post = Post::find($id);
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        return view('posts.edit', ['post' => $post]);
    }
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->save();
        return redirect('/posts')->with('message', '投稿を更新しました！');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $post->delete();
        return redirect('/posts')->with('message', '投稿を削除しました。');
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

}
