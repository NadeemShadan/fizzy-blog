@extends('layouts.app')

@section('content')
    <h1>Create a new Bio</h1>
    {!! Form::open(['action'=>'TreesController@store'],'POST') !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Enter User Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Enter user info here'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-success'])}}
{!! Form::close() !!}
@endsection
