@extends('layouts.app')

@section('content')
    <h1>Edit car</h1>
    {!! Form::open(["action" => ["CarsController@update", $car->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('naslov','Naslov ')}}
        {{
            Form::text('naslov',$car->naslov,['class'=>'form-control','placeholder'=>'Naslov'])
        }}
    </div>
    <div class="form-group">
            {{Form::label('opis','Opis ')}}
            {{
                Form::textarea('opis',$car->opis,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body text'])
            }}
        </div> 
        <div class="form-group">
                {{Form::file('cover_image')}}        
            
            </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection

