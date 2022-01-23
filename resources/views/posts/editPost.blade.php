
@extends('layouts.app')
@section('content')

    @if(count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>
        <form action="/posts/{{$post->id}}" method="POST">
            {{csrf_field()}}
            <div>Title :{{$post->title}}<input class="form-control input-lg" type="text" name="title" value="{{$post->title}}"/></div>
            <br>
            <div>Description: {{$post->content}} <input class="form-control input-lg" type="text" name="content" value="{{$post->content}}"/></div>
            <br>
            <button style="background-color: aqua" class="btn btn-default" type="submit">Submit</button>
            <div></div><input type="hidden" name="_method" value="PUT"></div>
        </form>
    </h3>
@endsection






