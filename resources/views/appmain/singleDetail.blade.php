@extends('layouts.app')

@section('content')
            <div class="jumbotron text-center">
                    <small><img src="/storage/cover_images/{{$singleDetail->cover_image}}" class="img-circle">
                        </small>
                <h3>{{$singleDetail->title}}</h3>
                <p>{!!$singleDetail->body!!}</p>
            </div>
            <hr>
            <small>{{$singleDetail->created_at}}</small><br>
            <a href="/trees" class="btn btn-info">Go Back</a>
            @if(!Auth::guest())
                @if(Auth::user()->id == $singleDetail->user_id)
            <div class="pull-right">
                {!!Form::open(['action'=>['TreesController@destroy',$singleDetail->id,'method'=>'POST']])!!}
                <a href="/trees/{{$singleDetail->id}}/edit" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                {!!Form::Hidden('_method','DELETE')!!}
                {!!Form::Button('<i class="glyphicon glyphicon-trash"></i>',['type'=>'submit','class'=>'btn btn-danger']) !!}
                {!!Form::close()!!}

            </div>
        @endif
        @endif


@endsection
