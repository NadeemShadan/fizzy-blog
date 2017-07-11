@extends('layouts.app')

@section('content')
            <div class="jumbotron text-center">
                <h3>{{$singleDetail->title}}</h3>
                <p>{{$singleDetail->body}}</p>
            </div>
            <hr>
            <small>{{$singleDetail->created_at}}</small><br>
            <a href="/trees" class="btn btn-info">Go Back</a>

@endsection
