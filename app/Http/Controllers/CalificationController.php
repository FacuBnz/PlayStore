<?php

namespace App\Http\Controllers;

use App\Calification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalificationController extends Controller
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

    public function index( $id ){
        if(Auth::user()->role == 'ADMIN'){

            //verificar si es numerico
            if(is_numeric($id)){
                $calification = New Calification();

                $calification->application_id = $id;
                $calification->calification = 1;

                $calification->save();
            }

            return redirect()->route('home');

        }else{
            return redirect()->route('home');
        }
    }
}
