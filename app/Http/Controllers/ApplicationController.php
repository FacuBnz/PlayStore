<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

    public function newContent( $id ){
        if(Auth::user()->role == 'ADMIN'){

            return view('users.newApp_content', [
                'id' => $id,
            ]);
        }else{
            return redirect()->route('home');
        }
    }

    public function save(Request $request){

        //verificar si es administrador
        if(Auth::user()->role == 'ADMIN'){

            //crear nueva app
            $app = new Application();
            //validar datos del formulario
            $validate = $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'id' => ['required', 'string']
            ]);
            //recoger datos por post
            $name = $request->input('name');
            $description = $request->input('description');
            $id_category = $request->input('id');

            //asignar nueva data
            $app->category_id = $id_category;
            $app->name = $name;
            $app->description = $description;

            $image = $request->file('image');

            if($image){

                //assign unique name
                $image_full = time().$image->getClientOriginalName();

                //save to folder Storage
                Storage::disk('images')->put($image_full, File::get($image));

                //Set image
                $app->image = $image_full;
            }

            //guardar aplicacion
            $app->save();

            //obtener id de la app
            $id_app = Application::where('name', $name)
            ->where('category_id', $id_category)->first();

            //redireccionar a la otra vista
            return redirect()->route('newApp.calification' ,[
                'id' => $id_app,
            ]);
        }else{
            return redirect()->route('home');
        }

    }

    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);

        return new Response($file, 200);
    }

}
