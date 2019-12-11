<?php

namespace App\Http\Controllers;

use App\Post;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();    
        return view('article.index', compact('posts'));
    }

    /**
     * Handle article slug
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        $post =   Post::where('slug', $slug)->firstOrFail();
        return view('article.show')->with('post', $post)->withShortcodes();
    }
}
