@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->id == 1)
                    <table class="table table-striped">
                            <tr> 
                        <th>Admin panel</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                            </tr> 
                      <tr>  
                          <td>Create</td>
                     <td><a href="models/create" class="btn btn-primary" >Create model </a></td>
                     <td><a href="brands/create" class="btn btn-primary" >Create brand </a></td>   
                     <td><a href="countries/create" class="btn btn-primary" >Add country </a></td> 
                     <td><a href="cities/create" class="btn btn-primary" >Add city </a></td> 
                      </tr>
                      <tr>  
                            <td>View</td>
                       <td><a href="models/" class="btn btn-primary" >View models </a></td>
                       <td><a href="brands/" class="btn btn-primary" >View  brands</a></td>   
                       <td><a href="countries/" class="btn btn-primary" >View countries </a></td> 
                       <td><a href="cities/" class="btn btn-primary" >View cities </a></td> 
                        </tr>
                        <tr><td>Users</td>
                            <td><a href="users/" class="btn btn-primary" >View Users </a></td>
                            <td></td>   
                            <td></td> 
                            <td></td> 
                             
                            </tr>
                    </table>
                    @endif
                    <a href="cars/create" class="btn btn-primary" >Create car </a>
                    <h3>Your Cars</h3>
                    @if(count($cars)> 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>  </th>
                            <th>  </th>
                        </tr>  
                        
                        @foreach ($cars as $car)
                        <tr>
                        <td>{{$car->models->name}}</td>
                                <td><a href="/lsapp/public/cars/{{$car->id}}/edit" class="btn btn-primary">Edit</a> </td>
                                <td>
                                {!!Form::open(['action' => ['CarsController@destroy', $car->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </td> 
                            </tr>  
                            
                        @endforeach
                    </table>
                    @else
                        <p> You have no cars </p> 
                    
                    @endif
                    <h3>Your rents</h3>
                    @if(count($rents)> 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Car rented</th>
                            <th>  </th>
                            <th>  </th>
                            <td></td>
                            <td></td>
                        </tr>  
                        
                        @foreach ($rents as $rent)
                        <tr>
                        <td>{{$rent->car->models->name}}</td>
                        <td>{{date('d.m.Y', strtotime($rent->rent_start))}}</td>
                        <td>{{date('d.m.Y', strtotime($rent->rent_stop))}}</td>
                                <td><a href="/lsapp/public/rents/{{$rent->id}}/edit" class="btn btn-default">Edit</a> </td>
                                <td>
                                {!!Form::open(['action' => ['RentsController@destroy', $rent->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </td>
                                
                            </tr>  
                            
                        @endforeach
                    </table>
                    @else
                        <p> You have no rents </p> 
                    
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
