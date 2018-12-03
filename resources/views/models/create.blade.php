@extends('layouts.app')

@section('content')
    <h1>Add Model</h1>
    {!! Form::open(["action" => "ModelsController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group">
                {{Form::label('name','Name')}}
                {{
                    Form::text('name','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])
                }}
            </div> 
            <div class="form-group">
                    {{Form::label('doors','Doors')}}
                    {{
                        Form::number('doors', 'value',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])
                    }}
                </div> 
                <div class="form-group">
                        {{Form::label('hp','Horse power')}}
                        {{
                            Form::number('hp', 'value',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])
                        }}
                    </div> 
                    <div class="form-group">
                            {{Form::label('year','Year')}}
                            {{
                                Form::number('year', 'value',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])
                            }}
                        </div> 
            <div class="form-group">
        {{Form::label('brand','Brand')}}
           {{Form::select('brand', $items, null ,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Name'])}}

        </div> 
        
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection
