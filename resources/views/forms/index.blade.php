@extends('layouts.app')
@section('content')
    <h1>
            Welcome {{$Name}}
    </h1>
    <small>In Here you can save bios, or even make quick notes</small>&#9787;
    <div class="jumbotron text-center">
        <h1>{{ config('app.name', 'Fizzy Bios') }} &nbsp; <i class="glyphicon glyphicon-book"></i></h1>
        <p><a class="btn btn-primary" href="/login">Sign in</a> <a href="/register" class="btn btn-success">Register</a></p>
        <header> or view bios if you wish.. <a href="/trees" class="btn-xs btn btn-default">View</a></header>

    </div>
@endsection
