@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    Welcome {!!Auth::user()->name!!}
                </div>
                <div class="panel-body">
                    bios Saved
                    <span class="badge pull-right">{{count($user)}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><strong>{!!Auth::user()->name!!}</strong></div>
                <div class="panel-body">
                    {!!Auth::user()->name!!}
                    <a href="" class="pull-right btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                </div>
                <hr>
                <div class="panel-body">
                    {!!Auth::user()->email!!}
                </div>
            </div>
        </div>
        <div class="col-md-6 jumbotron">
            <h2>
            {!!Auth::user()->name!!}'s bios
            </h2>
            <ul class="col-md-12 list-group">
                @foreach($user as $post)
                <li class="list-group-item"><a href="/trees/{{$post->id}}">{{$post->title}}</a><span class="pull-right">{!!Form::open(['action'=>['TreesController@destroy',$post->id,'method'=>'POST']])!!}
                <a href="/trees/{{$post->id}}/edit" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                {!!Form::Hidden('_method','DELETE')!!}
                {!!Form::Button('<i class="glyphicon glyphicon-trash"></i>',['type'=>'submit','class'=>'btn btn-danger']) !!}
                {!!Form::close()!!}</span></li>
            @endforeach
        {{-- @else
            <h2>
            {!!Auth::user()->name!!} haven't created any bios
            </h2>
        @endif --}}
            </ul>
        </div>
    </div>
</div>
@endsection
