@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row content">

            @if(isset($info))
                <h2>{{$info}}</h2>
            @endif
            @if(isset($posts))
                <h4><small>Recent Posts</small></h4>
                @foreach($posts as $post)

                    <hr>
                    <h3 style="color: black;"> Title: {{$post->title}}</h3>
                    <h5><span class="glyphicon glyphicon-time"></span> Created at: {{$post->created_at}}
                        by {{$post->user->name}}</h5>


                    <br>
                    <p> <h4><a href="posts/{{$post->id}}">Read more</a></h4>  </p>
                    <br><br>
                @endforeach
            @endif
            <hr>
            <h3><a href="posts/create">Add a Post</a></h3>

            <h4>Leave a Comment:</h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <br><br>

            <p><span class="badge">2</span> Comments:</p><br>


            <footer class="container-fluid">
                <p>Footer Text</p>
            </footer>
        </div>
    </div>

@endsection

