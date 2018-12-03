@extends('layouts.app')

@section('content')
    <h1>Add Car</h1>
    {!! Form::open(["action" => "CarsController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
            {{Form::label('opis','Opis')}}
            {{
                Form::textarea('opis',' ',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'description'])
            }}
        </div> 
        <div class="form-group">
                {{Form::label('naslov','Naslov')}}
                {{
                    Form::text('naslov','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Adress'])
                }}
            </div> 
            <div class="form-group">
        {{Form::label('model','Model')}}
           {{Form::select('model', $items, null ,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])}}

        </div> 
        <div class="form-group">
                {{Form::label('year','Year of production')}}
                   {{Form::number('year', 'value',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])}}
        
                </div> 
        <div class="form-group">
            {{Form::file('cover_image')}}        
        
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection
