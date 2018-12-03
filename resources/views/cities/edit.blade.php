@extends('layouts.app')

@section('content')
    <h1>Edit city</h1>
    {!! Form::open(["action" => ["CitiesController@update", $city->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name ')}}
        {{
            Form::text('name',$city->name,['class'=>'form-control','placeholder'=>'Name'])
        }}
    </div>
    
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection

