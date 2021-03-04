<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $table = 'wish_list';

    //relacion muchos a uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    //relacion muchos a uno
    public function application(){
        return $this->belongsTo('App\Application', 'application_id');
    }
}
