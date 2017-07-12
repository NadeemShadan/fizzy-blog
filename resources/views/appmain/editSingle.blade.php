@extends('layouts.app')

@section('content')
    <h1>Edit {{$singleDetail->title}}'s Bio</h1>
    {!! Form::open(['action'=>['TreesController@update',$singleDetail->id],'POST']) !!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$singleDetail->title,['class'=>'form-control','placeholder'=>'Enter User Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body',$singleDetail->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter user info here'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Save Changes',['class'=>'btn btn-success'])}}
{!! Form::close() !!}
@endsection
