<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Brand;
use App\Models;

class CarsController extends Controller
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
        
        $cars = Car::orderBy('id','desc')->paginate(10);

        return view('cars.index')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Models::pluck('name', 'id');


        return view('cars.create')->with('items', $items );
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
            'opis' => 'required',
            'naslov' => 'required',
            'cover_image' => 'image|nullable|max:1999',
           
        ]);

        //Handle File Upload     


        if($request->hasFile('cover_image')){
                //Handle File Upload
  if($request->hasFile('cover_image')){
   //Get filename with the extension
    $filenamewithExt = $request->file('cover_image')->getClientOriginalName();
    
   //Get just filename
   $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
   
   //Get just ext
   $extension = $request->file('cover_image')->guessClientExtension();
   
   //FileName to store
   $fileNameToStore = time().'.'.$extension;
   
   //Upload Image
   $path = $request->file('cover_image')->storeAs('public/cover_images/',$fileNameToStore);

        }
        else{

            $fileNameToStore='noimage.jpg';
        }
         

        //create car
              $car = new Car;
              $car->opis = $request->input('opis')  ;
              $car->naslov = $request->input('naslov')  ;
              $car->user_id =auth()->user()->id; 
              $car->model_id= $request->input('model');
              $car->year= $request->input('year');
              $car->cover_image= $fileNameToStore;
              $car->save();

              return redirect('/cars')->with('success','Car Added');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show')->with('car', $car );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);

        //check for correct user
        if(auth()->user()->id !== $car->user_id ){

            return redirect('/cars ')->with('error', 'Unautharize page' );

        }
        
            return view('cars.edit')->with('car', $car );


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
            'opis' => 'required',
            'naslov' => 'required',
           
        ]);

          
            //Handle File Upload
if($request->hasFile('cover_image')){
//Get filename with the extension
$filenamewithExt = $request->file('cover_image')->getClientOriginalName();

//Get just filename
$filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

//Get just ext
$extension = $request->file('cover_image')->guessClientExtension();

//FileName to store
$fileNameToStore = time().'.'.$extension;

//Upload Image
$path = $request->file('cover_image')->storeAs('public/cover_images/',$fileNameToStore);

    }

     
        //create car
              $car = Car::find($id);
              $car->naslov = $request->input('naslov')  ;
              $car->opis = $request->input('opis')  ;
              if($request->hasFile('cover_image')){
                $car->cover_image = $fileNameToStore;
              }
              $car->save();

              return redirect('/cars')->with('success','Car Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $car = Car::find($id);
        if(auth()->user()->id !== $car->user_id ){

            return redirect('/cars ')->with('error', 'Unautharize page' );

        }
        
        $car ->  delete();
        return redirect('/cars')->with('success','Car Deleted ');
    }
}
