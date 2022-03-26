<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.allpost', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => Str::slug($request->title.'-'.Str::limit(strip_tags(clean($request->body)), 10)),
        ]);
        return back();
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.post', ['post' => $post]);
    }
    public function editpage($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.edit', ['post' => $post]);
    }
    public function edit(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = Str::slug($request->title.'-'.Str::limit(strip_tags(clean($request->body)), 10));
        $post->save();
        return redirect()->route('show', $post->slug);
    }
    public function delete($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();
        return redirect()->route('posts');;
    }
}
