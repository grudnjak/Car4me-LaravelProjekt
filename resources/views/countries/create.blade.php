@extends('layouts.app')

@section('content')
    <h1>Add Country</h1>
    {!! Form::open(["action" => "CountriesController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group">
                {{Form::label('name','Name')}}
                {{
                    Form::text('name','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])
                }}
            </div> 
        
        
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection
