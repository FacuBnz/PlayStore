<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calification extends Model
{
    protected $table = 'califications';

    //relacion muchos a uno
    public function application(){
        return $this->belongsTo('App\Application', 'application_id');
    }
}
