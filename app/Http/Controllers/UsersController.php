<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('name','asc')->paginate(10);
        return view('users.index')->with('users',$users);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $auid = Auth::id();

        //check for correct user
        if(auth()->user()->id == 1 ||  $auid == $user->id ){

            return view('users.edit')->with('user', $user );

        }
        return redirect('/users ')->with('error', 'Unautharize page' );
        
           



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
              $user = User::find($id);
              $user->name = $request->input('name')  ;
              $user->email = $request->input('email')  ;
             
              $user->save();

              return redirect('/dashboard')->with('success','User Updated ');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(auth()->user()->id !== 1 ){

            return redirect('/users ')->with('error', 'Unautharize page' );

        }
        
        $user ->  delete();
        return redirect('/users')->with('success','User deleted');
   
    }
}
