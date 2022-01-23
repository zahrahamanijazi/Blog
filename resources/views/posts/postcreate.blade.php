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
        <form action="/posts" method="POST">
            {{csrf_field()}}
            Title:
            <div><input class="form-control input-lg" type="text" name="title"/></div>
            <br>
            Description:
            <div> <input class="form-control input-lg" type="text" name="content"/></div>
            <input type="hidden" name="_method" >
            <br>
            <div></div><input type="submit" class="btn btn-success"></div>

        </form>
    </h3>
@endsection

