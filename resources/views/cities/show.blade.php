@extends('layouts.app')

@section('content')
    <a href="/lsapp/public/cities" class="btn btn-default">Go back</a>
    <br>
    <br>
    <h1>City name:</h1>
    <br>
    <h3>{{$city->name}}</h3>
    <br>
    <h1>Country:</h1>
    <br>
    <h3>{{$city->country->name}}</h3>   
@if(!Auth::guest())
    @if(Auth::user()->id == 1)
<a href="/lsapp/public/cities/{{$city->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['CitiesController@destroy', $city->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif 
@endif
@endsection

