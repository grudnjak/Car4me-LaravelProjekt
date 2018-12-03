@extends('layouts.app')

@section('content')
    <h1>Edit model</h1>
    {!! Form::open(["action" => ["ModelsController@update", $model->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name ')}}
        {{
            Form::text('name',$model->name,['class'=>'form-control','placeholder'=>'Name'])
        }}
    </div>
    <div class="form-group">
            {{Form::label('hp','Horse power ')}}
            {{
                
                Form::number('hp',$model->horse_power,['class'=>'form-control','placeholder'=>'Name'])
            }}
        </div>
        <div class="form-group">
                {{Form::label('doors','Doors ')}}
                {{
                    
                    Form::number('doors',$model->doors,['class'=>'form-control','placeholder'=>'Name'])
                }}
            </div>
            <div class="form-group">
                    {{Form::label('year','Year ')}}
                    {{
                        
                        Form::number('year',$model->year,['class'=>'form-control','placeholder'=>'Name'])
                    }}
                </div>
    
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection

