<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
   //table name
   protected $table ='cars';
   //Primary key
   public $primaryKey = 'id';
   //Timestamps
   public $timestamps = false;

   public function user(){
    return $this -> belongsTo('App\User');
   
}
public function models(){
    return $this -> belongsTo('App\Models','model_id');
}
public function rent(){
    return $this->hasMany('App\Rent');

}
}
