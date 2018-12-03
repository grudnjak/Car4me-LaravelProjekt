@extends('layouts.app')

@section('content')
    <a href="/lsapp/public/rents" class="btn btn-default">Go back</a>
    <br>
    <h1>{{$rent->car->models->name}}</h1>
    <br>
    <div class="well">
            <div class="row">
           <div class="col-md-4 col-sm-4 ">
                <h3>Opis avtomobila:</h3>
                <p>{!!$rent->car->opis!!}</p> 
                <br>
                <h3>Letnik:</h3>
                <p>{!!$rent->car->year!!}</p> 
                <br>
                <h3>Model:</h3>
                <p>{!!$rent->car->models->name!!}</p> 
                <br>
                <h3>Znamka:</h3>
                <p>{!!$rent->car->models->brand->name!!}</p> 
                           
                
                <h4>Lastnik {{$rent->car->user->name}}</h4>
           </div>
           <div class="col-md-8 col-sm-8">
                <h3>Rent start:</h3>
                <p>{!!date('d-m-Y', strtotime($rent->rent_start))!!}</p> 
                <br>
                <h3>Rent stop:</h3>
                <p>{!!date('d-m-Y', strtotime($rent->rent_stop))!!}</p> 
                <br>
                <h3>Person renting:</h3>
                <p>{!!$rent->user->name!!}</p> 
                <br>
                </div>
                            </div>
                        </div>



@if(!Auth::guest())


    
@if(Auth::user()->id == $rent->user_id)
    

<a href="/lsapp/public/rents/{{$rent->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['RentsController@destroy', $rent->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif 
@endif
@endsection

