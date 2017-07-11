@extends('layouts.app')

@section('content')
    @if(count($usersData)>0)
        @foreach($usersData as $user)
            <div class="panel text-center">
                <h3><a href="/trees/{{$user->id}}">{{$user->title}}</a></h3>
                <span class="text-right">{{$user->created_at}}</span>
            </div>
        @endforeach
        {{$usersData->links()}}

    @else
        <p>There's no one in here try adding someone</p><br>
    @endif
@endsection
