<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //table name
    protected $table ='brands';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;

    public function models(){
        return $this->hasMany('App\Model');

    }

    public function country(){
        return $this -> belongsTo('App\Country','country_id');
    }
}
