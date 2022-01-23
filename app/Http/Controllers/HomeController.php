<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $posts=Post::where('user_id', $id)->get();

        return view('home',['posts'=>$posts]);

    }
    public function adminHome()
    {
        return view('adminHome');
    }
}
