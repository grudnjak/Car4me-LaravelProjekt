@extends('layouts.app')

@section('content')
@if(!Auth::guest())
                            @if(Auth::user()->id == 1)
<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Cars</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    <a href="/lsapp/public/brands/create" class="btn btn-primary">Add a brand</a>
        </div>
    </div>
    @endif
    @endif
    
@if(count($brands)> 0)
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
                        
                        @foreach ($brands as $brand)
                        <tr>
                        <td> <a href="brands/{{$brand->id}}">{{$brand->name}}</a></td>
                                @if(!Auth::guest())
                                @if(Auth::user()->id == 1)
                                <td><a href="/lsapp/public/brands/{{$brand->id}}/edit" class="btn btn-default">Edit</a> </td>
                                <td>
                                {!!Form::open(['action' => ['BrandsController@destroy', $brand->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </td> 
                                @endif
                                @endif
                               
                            </tr>  
                            
                        @endforeach
                    </table>
                    {{$brands->links()}}

                    @else
                        <p> There are no brands </p> 
                    
                    @endif
@endsection

