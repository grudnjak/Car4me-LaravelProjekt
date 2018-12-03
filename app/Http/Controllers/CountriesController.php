<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    public function index()
    {
        $countries = Country::orderBy('name','asc')->paginate(10);
        return view('countries.index')->with('countries',$countries);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
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
            
           
        ]);

       
        //create brand
              $country = new Country;
              $country->name = $request->input('name')  ;
              $country->save();

              return redirect('/countries')->with('success','Country Created');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        return view('countries.show')->with('country', $country );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);

        //check for correct user
        if(auth()->user()->id !== 1 ){

            return redirect('/countries ')->with('error', 'Unautharize page' );

        }
        
            return view('countries.edit')->with('country', $country );



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
              $country = Country::find($id);
              $country->name = $request->input('name')  ;
             
              $country->save();

              return redirect('/countries')->with('success','Country Updated ');
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        if(auth()->user()->id !== 1 ){

            return redirect('/countries ')->with('error', 'Unautharize page' );

        }
        
        $country ->  delete();
        return redirect('/countries')->with('success','Country deleted');
    }
}
