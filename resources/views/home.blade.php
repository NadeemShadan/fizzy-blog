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
                    <span class="badge pull-right">{{$count}}</span>
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
    </div>
</div>
@endsection
