@extends('layouts.app')

@section('content')
    <a href="/lsapp/public/countries" class="btn btn-default">Go back</a>
    <br>
    <br>
    <h1>Country name:</h1>
    <br>
    <h3>{{$country->name}}</h3>
    <br>
@if(!Auth::guest())
    @if(Auth::user()->id == 1)
<a href="/lsapp/public/cities/{{$country->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['CountriesController@destroy', $country->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif 
@endif
@endsection

