<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   //table name
   protected $table ='cities';
   //Primary key
   public $primaryKey = 'id';
   //Timestamps
   public $timestamps = false;

   public function country(){
    return $this -> belongsTo('App\Country');
}
}
