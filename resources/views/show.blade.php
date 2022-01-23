Hello
@foreach($posts as $post)

    <div style="border: solid blueviolet" class="col-sm-3">
        <h2><p>{{$post->title}}</p></h2>
        <br>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        <br>
        Content: {{$post->content}}
        <br><br>
        <h4><a href="posts/{{$post->id}}/edit">Edit</a></h4>
        <h4><a href="posts/{{$post->id}}">Delete</a></h4>

    </div>

@endforeach
