@extends('layouts.app')

@section('content')
    <a href="/lsapp/public/users" class="btn btn-default">Go back</a>
    <br>
    <br>
    <h1>Name:</h1>
    <br>
    <h3>{{$user->name}}</h3>
    <br>
    <h1>Email:</h1>
    <br>
    <h3>{{$user->email}}</h3>   
@if(!Auth::guest())
    @if(Auth::user()->id == 1 || Auth::user()->id == $user->id)
<a href="/lsapp/public/users/{{$user->id}}/edit" class="btn btn-default">Edit</a>

@endif 
@endif
@endsection

