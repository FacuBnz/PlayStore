<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newApp(){
        if(Auth::user()->role == 'ADMIN'){
            return view('users.newApp');
        }else{
            return redirect()->route('home');
        }
    }

    public function save(Request $request){

        //verificar si es administrador
        if(Auth::user()->role == 'ADMIN'){
            //recoger datos por post
            //validar datos
            //guardar aplicacion
        }else{
            return redirect()->route('home');
        }

    }

}
