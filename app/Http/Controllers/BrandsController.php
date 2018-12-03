<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Country;

class BrandsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('name','asc')->paginate(10);
        return view('brands.index')->with('brands',$brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Country::pluck('name', 'id');


        return view('brands.create')->with('items', $items );
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
              $brand = new Brand;
              $brand->name = $request->input('name')  ;
              $brand->country_id = $request->input('country')  ;
              $brand->save();

              return redirect('/brands')->with('success','Brand Created');
            }
        
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $brand = Brand::find($id);
        return view('brands.show')->with('brand', $brand );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        //check for correct user
        if(auth()->user()->id !== 1 ){

            return redirect('/brands ')->with('error', 'Unautharize page' );

        }
        
            return view('brands.edit')->with('brand', $brand );



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
              $brand = Brand::find($id);
              $brand->name = $request->input('name')  ;
             
              $brand->save();

              return redirect('/brands')->with('success','Brand Updated ');
            }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if(auth()->user()->id !== 1 ){

            return redirect('/brands ')->with('error', 'Unautharize page' );

        }
        
        $brand ->  delete();
        return redirect('/brands')->with('success','Brand deleted');
    }
}

