@extends('layouts.app')

@section('content')
    <h1>Add City</h1>
    {!! Form::open(["action" => "CitiesController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group">
                {{Form::label('name','Name')}}
                {{
                    Form::text('name','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])
                }}
            </div> 
            <div class="form-group">
        {{Form::label('country','Country')}}
           {{Form::select('country', $items, null ,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])}}

        </div> 
        
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection
