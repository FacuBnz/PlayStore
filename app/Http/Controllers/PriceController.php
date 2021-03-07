<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriceController extends Controller
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
            return view('users.newApp_price', ['id' => $id]);
        }else{
            return redirect()->route('home');
        }
    }

    public function save(Request $request){
        //verificar si es admin
        if(Auth::user()->role == 'ADMIN'){
            //validar datos
            $validate = $this->validate($request, [
                'price' =>['required','numeric'],
                'id' => ['required', 'integer'],
            ]);
            //obtener datos de la request
            $price = $request->input('price');
            $id = $request->input('id');
            //asignar nuevos datos
            $newPrice = new Price();

            $newPrice->application_id = $id;
            $newPrice->price = $price;

            //guardar datos
            $newPrice->save();

            //retornar al home
            return redirect()->route('home');
        }else{
            return redirect()->route('home');
        }

    }
}
