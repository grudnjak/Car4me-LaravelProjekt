@extends('layouts.app')

@section('content')
    <a href="/lsapp/public/models" class="btn btn-default">Go back</a>
    <br>
    <br>
    <h1>Model name:</h1>
    <br>
    <h3>{{$model->name}}</h3>
    <br>
    <h1>Brand:</h1>
    <br>
    <h3>{{$model->brand->name}}</h3>   
    <br>
    <h1>Horse power:</h1>
    <br>
    <h3>{{$model->horse_power}}</h3>   
    <br>
    <h1>Doors:</h1>
    <br>
    <h3>{{$model->doors}}</h3>   
    <br>
    <h1>Year:</h1>
    <br>
    <h3>{{$model->year}}</h3> 
@if(!Auth::guest())
    @if(Auth::user()->id == 1)
<a href="/lsapp/public/models/{{$model->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['ModelsController@destroy', $model->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif 
@endif
@endsection

