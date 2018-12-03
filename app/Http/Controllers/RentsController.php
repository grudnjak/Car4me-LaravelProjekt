<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;
use App\User;
use App\Car;

class RentsController extends Controller
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
        $rents = Rent::orderBy('rent_start','asc')->paginate(10);
        return view('rents.index')->with('rents',$rents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {  
        $car = Car::find($id);
        //pac uglavnem dej mas form za nardit pa dej ntr hidden field ko ma car_id nastavlen na id od array_count_values
       //okj
       //sam zanima me ce je okej oz bi delalo enako tista kr sm ti prej kazu
        return view('rents.create')->with('car', $car);
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
  
            'car_id' => 'required',
            'rent_start' => 'required',
            'rent_stop' => 'required',
           
        ]);

        //$rentstop = Rent::pluck('rent_stop');
        //$rentstart = Rent::pluck('rent_start');
        
        $rs = $request->input('rent_stop');
        $rst = $request->input('rent_start');
        $cid = $request->input('car_id');
        
        $rez = Rent::where('car_id','=',$cid)
        ->whereBetween('rent_start', [$rst, $rs])
        ->orWhereBetween('rent_stop', [$rst, $rs]) 
        ->get();
        if (
         //  $w= whereDate('rentstop','<=','$rs') && $e=whereDate('$rentstart','>=','$rst')
         //Rent::whereBetween($rs, $rentstart, $rentstop)    && Rent::WhereBetween($rst, $rentstart, $rentstop)
         //Rent::whereBetween($rs, 'rent_start', 'rent_start')    && Rent::WhereBetween($rst, 'rent_start', 'rent_stop')
         !$rez->count() && $rst < $rs
         )
       {
        $rent = new Rent;
        $rent->car_id = $request->input('car_id')  ;
        $rent->rent_start = $request->input('rent_start')  ;
        $rent->rent_stop = $request->input('rent_stop')  ;
        $rent->user_id =auth()->user()->id; 
        $rent->rate = 0;
        $rent->save();

        return redirect('/rents')->with('success','Rented');

       }
       return redirect('/rents')->with('error','Date already in use');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rent = Rent::find($id);
        return view('rents.show')->with('rent', $rent );    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rent = Rent::find($id);

        //check for correct user
        if(auth()->user()->id !== $rent->user_id ){

            return redirect('/rents ')->with('error', 'Unautharize page' );

        }
        
            return view('rents.edit')->with('rent', $rent);



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
  
        
            'rent_start' => 'required',
            'rent_stop' => 'required',
           
        ]);

        //$rentstop = Rent::pluck('rent_stop');
        //$rentstart = Rent::pluck('rent_start');
        
        $rs = $request->input('rent_stop');
        $rst = $request->input('rent_start');
        $cid = $request->input('car_id');
        
        $rez = Rent::where('car_id','=',$cid)
        ->whereBetween('rent_start', [$rst, $rs])
        ->orWhereBetween('rent_stop', [$rst, $rs]) 
        ->get();
        if (
         //  $w= whereDate('rentstop','<=','$rs') && $e=whereDate('$rentstart','>=','$rst')
         //Rent::whereBetween($rs, $rentstart, $rentstop)    && Rent::WhereBetween($rst, $rentstart, $rentstop)
         //Rent::whereBetween($rs, 'rent_start', 'rent_start')    && Rent::WhereBetween($rst, 'rent_start', 'rent_stop')
         !$rez->count() && $rst < $rs
         )
       {
        $rent = Rent::find($id);
        $rent->rent_start = $request->input('rent_start')  ;
        $rent->rent_stop = $request->input('rent_stop')  ;
        $rent->save();

        return redirect('/rents')->with('success','Rente edited');

       }
       return redirect('/rents')->with('error','Date already in use');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rent = Rent::find($id);
        if(auth()->user()->id !== $rent->user_id ){

            return redirect('/rents ')->with('error', 'Unautharize page' );

        }
        
        $rent ->  delete();
        return redirect('/rents')->with('success','Rent Deleted ');

    }
}
