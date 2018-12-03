@extends('layouts.app')

@section('content')

@if(!Auth::guest())
                            @if(Auth::user()->id == 1)
<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Cities:</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    <a href="/lsapp/public/cities/create" class="btn btn-primary">Add a city</a>
        </div>
    </div>
    @endif
    @endif
    
@if(count($cities)> 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            @if(!Auth::guest())
                            @if(Auth::user()->id == 1)
                            <th>  </th>
                            <th>  </th>
                            <th>  </th>
                            @endif
                            @endif
                         
                        </tr>  
                        
                        @foreach ($cities as $city)
                        <tr>
                        <td> <a href="cities/{{$city->id}}">{{$city->name}}</a></td>
                                @if(!Auth::guest())
                                @if(Auth::user()->id == 1)
                        <td> {{$city->country->name}}</td>
                                <td><a href="/lsapp/public/cities/{{$city->id}}/edit" class="btn btn-default">Edit</a> </td>
                                <td>
                                {!!Form::open(['action' => ['CitiesController@destroy', $city->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </td> 
                                @endif
                                @endif
                               
                            </tr>  
                            
                        @endforeach
                    </table>
                    {{$cities->links()}}

                    @else
                        <p> There are no cities </p> 
                    
                    @endif
@endsection

