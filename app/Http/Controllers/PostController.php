<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return Inertia::render('Post/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($post) {
            return Redirect::route('posts.index')->with('message', 'Data berhasil disimpan!');
        }
    }
}
