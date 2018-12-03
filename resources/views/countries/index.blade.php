@extends('layouts.app')

@section('content')

@if(!Auth::guest())
                            @if(Auth::user()->id == 1)
<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Countries:</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    <a href="/lsapp/public/countries/create" class="btn btn-primary">Add a country</a>
        </div>
    </div>
    @endif
    @endif
    
@if(count($countries)> 0)
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
                        
                        @foreach ($countries as $country)
                        <tr>
                        <td> <a href="countries/{{$country->id}}">{{$country->name}}</a></td>
                                @if(!Auth::guest())
                                @if(Auth::user()->id == 1)
                        
                                <td><a href="/lsapp/public/countries/{{$country->id}}/edit" class="btn btn-default">Edit</a> </td>
                                <td>
                                {!!Form::open(['action' => ['CountriesController@destroy', $country->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </td> 
                                @endif
                                @endif
                               
                            </tr>  
                            
                        @endforeach
                    </table>
                    {{$countries->links()}}

                    @else
                        <p> There are no countries </p> 
                    
                    @endif

@endsection

