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
        $posts = Post::all();
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
            'slug' => Str::slug($request->title)
        ]);
        return back();
    }
}
