<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

    //relacion muchos a uno
    public function application(){
        return $this->belongsTo('App\Application', 'application_id');
    }
}
