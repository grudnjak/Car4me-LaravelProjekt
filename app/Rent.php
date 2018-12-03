<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    //
    public $timestamps = false;

public function user(){
    return $this -> belongsTo('App\User');
   
}

public function car(){
    return $this -> belongsTo('App\Car');
   
}
}