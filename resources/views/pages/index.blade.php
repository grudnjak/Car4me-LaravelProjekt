@extends('layouts.app')

@section('content')
    
@if(Auth::guest())
<div class="jumbotron text-center">
    <p>
        <a class="btn btn-primary btn-lg" href="/lsapp/public/login" role="button">Login</a>
        <a class="btn btn-success btn-lg" href="/lsapp/public/register" role="button">Register</a>
    </p>
</div>
<div class="container">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">CARS FOR RENT</h4>
             
            </div>
            <div class="card-body">
                    <h1> {{$car}} </h1>
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">USERS</h4>
             
            </div>
            <div class="card-body">
                    <h1>  {{$user}} </h1>
              
            </div>
          </div>
          <div class="card mb-4 shadow-sm">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">RENTS DONE</h4>
            </div>
            <div class="card-body">
                <h1>  {{$rent}} </h1>
            </div>
          </div>
        </div>
@else
@if ( (Auth::user()->id == 1))
<div class="jumbotron text-center">
    <h1>Pozdravljeni Administrator</h1>
    </div>
    <div class="container">
            <div class="card-deck mb-3 text-center">
              <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">CARS FOR RENT</h4>
                </div>
                <div class="card-body">
                        <h1> {{$car}} </h1>
                </div>
              </div>
              <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">USERS</h4>
                </div>
                <div class="card-body">
                  
                      <h1>  {{$user}} </h1>
                </div>
              </div>
              <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">RENTS DONE</h4>
                </div>
                <div class="card-body">
                    <h1>  {{$rent}} </h1>
                </div>
              </div>
            </div>

            @else
            <div class="jumbotron text-center">
                <h1>Pozdravljeni </h1>
                </div>
                <div class="container">
                        <div class="card-deck mb-3 text-center">
                          <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                              <h4 class="my-0 font-weight-normal">CARS FOR RENT</h4>
                            </div>
                            <div class="card-body">
                                    <h1> {{$car}} </h1>
                            </div>
                          </div>
                          <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                              <h4 class="my-0 font-weight-normal">USERS</h4>
                            </div>
                            <div class="card-body">
                              
                                  <h1>  {{$user}} </h1>
                            </div>
                          </div>
                          <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                              <h4 class="my-0 font-weight-normal">RENTS DONE</h4>
                            </div>
                            <div class="card-body">
                                <h1>  {{$rent}} </h1>
                            </div>
                          </div>
                        </div>
            
            @endif

@endif
@endsection
   
       
  