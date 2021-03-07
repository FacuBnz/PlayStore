<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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

    public function newCategory(){
        if(Auth::user()->role == 'ADMIN'){
            return view('users.newApp_category');
        }else{
            return redirect()->route('home');
        }
    }

    public function save(Request $request){

        //verificar si es administrador
        if(Auth::user()->role == 'ADMIN'){

            //validar datos del formulario
            $validate = $this->validate($request, [
                'category'=> ['required', 'string', 'max:255'],
            ]);

            //recoger datos por post
            $name = $request->input('category');

            $category = Category::where('name', $name)->first();

            var_dump($category);

            if(is_object($category) && $name == $category->name){
                $id = $category->id;
            }else{
                //guardar aplicacion
                $newCategory = new Category();
                $newCategory->name = $name;
                $newCategory->save();

                $category = Category::where('name', $name)->first();
                $id = $category->id;
            }

            return redirect()->route('newApp.content',['id' => $id]);
        }else{
            return redirect()->route('home');
        }
    }
}
