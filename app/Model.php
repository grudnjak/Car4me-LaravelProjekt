<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    //table name
    protected $table ='models';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;

    public function brand(){
        return $this -> belongsTo('App\Brand');
    }

    public function car(){
        return $this->hasMany('App\Car');

    }
}
