@extends('layouts.app')

@section('content')

    <div class="container" style="">

        <div class="container">
            @if(isset($info))
                <h2>{{$info}}</h2>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Updated at</th>
                </tr>
                </thead>
                <tbody>

                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td><a href="posts/{{$post->id}}/edit">Edit</a></td>
                        <td><a href="posts/{{$post->id}}">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <h4><a href="posts/create">Add a new Post</a></h4>

    </div>
    <br><br>

@endsection
