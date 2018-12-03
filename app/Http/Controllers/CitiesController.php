<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    public function index()
    {
        $cities = City::orderBy('name','asc')->paginate(10);
        return view('cities.index')->with('cities',$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Country::pluck('name', 'id');


        return view('cities.create')->with('items', $items );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'country' => 'required'
            
           
        ]);

       
        //create city
              $city = new City;
              $city->name = $request->input('name')  ;
              $city->country_id = $request->input('country')  ;
              $city->year = 0;
              $city->save();

              return redirect('/cities')->with('success','City Created');
            }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        return view('cities.show')->with('city', $city );
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);

        //check for correct user
        if(auth()->user()->id !== 1 ){

            return redirect('/cities ')->with('error', 'Unautharize page' );

        }
        
            return view('cities.edit')->with('city', $city );


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            
           
        ]);

          
           
     
        //create brand
              $city = City::find($id);
              $city->name = $request->input('name')  ;
             
              $city->save();

              return redirect('/cities')->with('success','City Updated ');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        if(auth()->user()->id !== 1 ){

            return redirect('/cities ')->with('error', 'Unautharize page' );

        }
        
        $city ->  delete();
        return redirect('/cities')->with('success','City deleted');
    
    }
}
