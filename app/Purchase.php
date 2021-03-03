<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

    //relacion muchos a uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function application(){
        return $this->belongsTo('App\Application', 'application_id');
    }
}
