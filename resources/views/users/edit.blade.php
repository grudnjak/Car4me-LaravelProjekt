@extends('layouts.app')

@section('content')
    <h1>Edit user</h1>
    {!! Form::open(["action" => ["UsersController@update", $user->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name ')}}
        {{
            Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Name'])
        }}
    </div>
    <div class="form-group">
    {{Form::label('email','Email ')}}
    {{
        Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'Name'])
    }}
</div>
    

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection

