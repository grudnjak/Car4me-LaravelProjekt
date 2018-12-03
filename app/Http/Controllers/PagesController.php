<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Car;
use App\Rent;

class PagesController extends Controller
{
    public function index(){
        $car= Car::count();
        $user = User::count();
        $rent = Rent::count();
        
       return view('pages.index')->with('car',$user)->with('user',$user)->with('rent',$rent);
    }

    public function about(){
        $title = 'About Us';
       return view('pages.about')->with('title',$title);
    }
    public function services(){
        $data = array(
            'title' => 'Services',
            'services'=> ['Web design','Programing', 'SEO']

        ); 
        return view('pages.services')->with($data);
    }
}
