@extends('layouts.app')

@section('content')

<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Users:</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                 
        </div>
    </div>

    
@if(count($users)> 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th> </th>
                            <th> </th>
                         
                        </tr>  
                        
                        @foreach ($users as $user)

                                    <tr>
                                    <td> <a href="users/{{$user->id}}">{{$user->name}}</a></td>
                                           
                                    @if(Auth::user()->id == 1 || Auth::user()->id == $user->id)
                                        
                                        <td><a href="/lsapp/public/users/{{$user->id}}/edit" class="btn btn-default">Edit</a> </td>
                                        <td> </td>
                                           
                                        </tr>  

                                    @else
                                    <td> </td>
                                    <td> </td>
                                    @endif  
                                        
                        @endforeach
                    </table>
                    {{$users->links()}}

                    @else
                        <p> There are no users </p> 
                    
                    @endif
@endsection

