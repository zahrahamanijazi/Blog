<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();

        return view('posts.posts')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.postcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:5',
            'content'=>'required'
        ]);
        $post=new Post();
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->user_id=auth()->user()->id;
        $post->save();
        return view('posts.post',['info'=>'post created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
       // echo Session::get('key');
        return view('posts.post')->with('post',$post);
    }
    public function showbyuser($id){
        $post=Post::find($id);
        $user_id=$post->user_id;

        $user=User::find($id);
        $posts=Post::where('user_id',$id)->get();
        return view('show')->with('posts',$posts);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.editPost')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|min:5',
            'content'=>'required'
        ]);
        $post=Post::find($id);
        $user_id=$post->user_id;
        if($user_id==auth()->user()->id){
            $post->title=$request->input('title');
            $post->content=$request->input('content');
            $post->save();
            // echo('post updated');
            return view('posts.post',['info'=>'Post edited successfully']);

        }
        else{
            return view('posts.post',['info'=>'you are not authenticated!!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $user_id=$post->user_id;
        if($user_id==auth()->user()->id){
            $post->delete();
            return view('posts.post',['info'=>'post deleted']);
        }
        else
        {
            return view('posts.post',['info'=>'You are not an authenticated user!!']);
        }


    }
}
