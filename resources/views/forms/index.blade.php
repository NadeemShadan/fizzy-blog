@extends('layouts.app')
@section('content')
    <h1>
            Welcome {{$Name}}
    </h1>
    <div class="jumbotron text-center">
        <h1>Get started</h1>
        <p><a class="btn btn-primary">Sign in</a> <a class="btn btn-success">Register</a></p>
    </div>
@endsection
