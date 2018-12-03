@extends('layouts.app')

@section('content')
    <h1>Edit country</h1>
    {!! Form::open(["action" => ["CitiesController@update", $country->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name ')}}
        {{
            Form::text('name',$country->name,['class'=>'form-control','placeholder'=>'Name'])
        }}
    </div>
    
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection

