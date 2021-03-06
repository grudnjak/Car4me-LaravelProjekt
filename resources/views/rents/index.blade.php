@extends('layouts.app')

@section('content')
    
@if(count($rents)> 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Rent</th>
                            <th>Car</th>
                            <th>Rent start</th>
                            <th>Rent stop</th>
                            @if(!Auth::guest())
                            @if(Auth::user()->id == 1)
                            <th>  </th>
                            <th>  </th>
                            @endif
                            @endif
                         
                        </tr>  
                        
                        @foreach ($rents as $rent)
                        <tr>
                        <td> 
                                <a href="rents/{{$rent->id}}">{{$rent->user->name}}</a> </td>
                                <td> {{$rent->car->models->brand->name}} {{$rent->car->models->name}} </td>
                                <td>  {{date('d-m-Y', strtotime($rent->rent_start))}}</td>
                                <td>  {{date('d-m-Y', strtotime($rent->rent_stop))}}</td>

                                @if(!Auth::guest())
                                @if(Auth::user()->id == 1)
                                <td><a href="/lsapp/public/rents/{{$rent->id}}/edit" class="btn btn-default">Edit</a> </td>
                                <td>
                                {!!Form::open(['action' => ['RentsController@destroy', $rent->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </td> 
                                @endif
                                @endif
                               
                            </tr>  
                            
                        @endforeach
                    </table>
                    {{$rents->links()}}

                    @else
                        <p> There are no brands </p> 
                    
                    @endif
@endsection

