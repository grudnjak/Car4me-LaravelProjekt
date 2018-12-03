@extends('layouts.app')

@section('content')
@if(!Auth::guest())
                            @if(Auth::user()->id == 1)
<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Models</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    <a href="/lsapp/public/models/create" class="btn btn-primary">Add a model</a>
        </div>
    </div>
    
    @endif
                            @endif
    
@if(count($models)> 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            @if(!Auth::guest())
                            @if(Auth::user()->id == 1)
                            <th>  </th>
                           <th>  </th>
                            @endif
                            @endif
                        </tr>  
                        
                        @foreach ($models as $model)
                        <tr>
                        <td> <a href="models/{{$model->id}}">{{$model->name}}</a></td>
                                @if(!Auth::guest())
                                @if(Auth::user()->id == 1)
                                <td><a href="/lsapp/public/models/{{$model->id}}/edit" class="btn btn-default">Edit</a> </td>
                                <td>
                                {!!Form::open(['action' => ['ModelsController@destroy', $model->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </td> 
                                @endif
                                @endif
                            </tr>  
                            
                        @endforeach
                    </table>
                    {{$models->links()}}
                    @else
                        <p> There are no modelss </p> 
                    
                    @endif
                    
@endsection

