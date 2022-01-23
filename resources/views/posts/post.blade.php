@extends('layouts.app')
@section('content')
    {{--    {{csrf_field()}}--}}
 @if(isset($post))
    <h2>Title: {{$post->title}}</h2>
    <div><h2>Description: {{$post->content}}</h2></div>

    <h3><a href="{{$post->id}}/edit">Edit</a></h3>
    <form action="{{$post->id}}" method="POST">
        {{csrf_field()}}
        <h2> <input type="hidden" name="_method" value="DELETE"></h2>
        <h2><input type="submit" style="background-color: aqua" class="btn btn-default"  value="Delete Post"></h2>
    </form>
 @endif
    @if(isset($info))
        <h2>{{$info}}</h2>
    @endif

@endsection
