@extends('layouts.app')

@section('content')
<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Cars</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    <a href="/lsapp/public/cars/create" class="btn btn-primary">Add a car</a>
        </div>
    </div>
    
    @if(count($cars) >= 1)
        @foreach ($cars as $car)
        <div class="jumbotron">
        <div class="well">
                         <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="storage/cover_images/{{$car->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                        <h3><a href="cars/{{$car->id}}">{{$car->models->name}}</a></h3>
                        <p>{{$car->opis}}</p>
                        <small>by {{$car->user->name}}</small>
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
        {{$cars->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection

