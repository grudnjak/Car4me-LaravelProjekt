@extends('layouts.app')

@section('content')
    <a href="/lsapp/public/cars" class="btn btn-default">Go back</a>
    <br>
    <h1>{{$car->models->name}}</h1>
    <br>
    <div class="well">
            <div class="row">
           <div class="col-md-4 col-sm-4">
  <img style="width:100%" src="/lsapp/public/storage/cover_images/{{$car->cover_image}}">
           </div>
           <div class="col-md-8 col-sm-8">


<h3>Opis avtomobila:</h3>
<p>{!!$car->opis!!}</p> 
<br>
<h3>Letnik:</h3>
<p>{!!$car->year!!}</p> 
<br>
<h3>Model:</h3>
<p>{!!$car->models->name!!}</p> 
<br>
<h3>Znamka:</h3>
<p>{!!$car->models->brand->name!!}</p> 
</div>
            </div>
<hr>
<small>Written by {{$car->user->name}}</small>
<hr>
@if(!Auth::guest())


    
@if(Auth::user()->id == $car->user_id)
    

<a href="/lsapp/public/cars/{{$car->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['CarsController@destroy', $car->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@else
<a href="/lsapp/public/rents/create/{{$car->id}}" class="btn btn-primary">Rent</a>
@endif 
@endif
@endsection

