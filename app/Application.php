<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    //relacion muchos a uno
    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    //relacion uno a muchos
    public function prices(){
        return $this->hasMany('App\Price', 'application_id');
    }

    //relacion uno a muchos
    public function califications(){
        return $this->hasMany('App\Calification', 'application_id');
    }
}
