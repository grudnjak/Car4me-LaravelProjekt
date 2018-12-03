<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Models;

class ModelsController extends Controller
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
        $models = Models::orderBy('name','asc')->paginate(10);
        return view('models.index')->with('models',$models);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Brand::pluck('name', 'id');


        return view('models.create')->with('items', $items );
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
            'year' => 'required',
            'doors' => 'required',
            'hp' => 'required',
            'brand' => 'required',

           
        ]);

       
        //create brand
              $model = new Models;
              $model->name = $request->input('name')  ;
              $model->brand_id = $request->input('brand')  ;
              $model->year = $request->input('year')  ;
              $model->doors = $request->input('doors')  ;
              $model->horse_power = $request->input('hp')  ;

              $model->save();

              return redirect('/models')->with('success','Model Created');
            }
        
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $model = Models::find($id);
        return view('models.show')->with('model', $model );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Models::find($id);

        //check for correct user
        if(auth()->user()->id !== 1 ){

            return redirect('/models ')->with('error', 'Unautharize page' );

        }
        
            return view('models.edit')->with('model', $model );



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
            'year' => 'required',
            'doors' => 'required',
            'hp' => 'required',
            

            
           
        ]);

          
           
     
        //create brand
              $model = Models::find($id);
              $model->name = $request->input('name')  ;
              $model->year = $request->input('year')  ;
              $model->doors = $request->input('doors')  ;
              $model->horse_power = $request->input('hp')  ;
              $model->save();

              return redirect('/models')->with('success','Model Updated ');
            }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Models::find($id);
        if(auth()->user()->id !== 1 ){

            return redirect('/models ')->with('error', 'Unautharize page' );

        }
        
        $model ->  delete();
        return redirect('/models')->with('success','Model deleted');
    }
}

