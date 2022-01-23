@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">

                        You are an Admin user
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid bg-3 text-center">
        <h3>My Posts</h3><br>
        <div class="row">
        @foreach($posts as $post)

            <div class="col-sm-3">
                <h2><p>{{$post->title}}</p></h2>
                <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                Content: {{$post->content}}
                <br><br>
                <h2><a href="posts/{{$post->id}}/edit">Edit</a></h2>
                <h2><a href="posts/{{$post->id}}">Delete</a></h2>
            </div>

         @endforeach
        </div>
        <h2><a href="posts/create">Add a new Post</a></h2>
    </div><br>
@endsection
