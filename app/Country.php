<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   //table name
   protected $table ='countries';
   //Primary key
   public $primaryKey = 'id';
   //Timestamps
   public $timestamps = false;

   public function cities(){
    return $this->hasMany('App\City');
   }
    public function brands(){
        return $this->hasMany('App\Brand');
}
}
