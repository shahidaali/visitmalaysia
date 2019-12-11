<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App;

class HomeController extends Controller
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
        $categories = App\Category::all();    
        return view('home', compact('categories'));
    }

    /**
     * Handle page slug
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function page($slug)
    {
        $page =   DB::table('pages')->where('slug', $slug)->first(); 
        return view('page')->with('page', $page);
    }

    /**
     * Handle article slug
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function article($slug)
    {
        $post =   DB::table('posts')->where('slug', $slug)->first(); 
        return view('article')->with('post', $post);
    }
}
