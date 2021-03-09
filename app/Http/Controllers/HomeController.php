<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(is_object(Auth::user()) && Auth::user()->role == 'ADMIN'){

            $user_id = Auth::user()->id;
            $apps = Application::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(6);

        }else{
            $apps = Application::orderBy('id', 'desc')->paginate(6);
        }

        return view('home', [
            'apps' => $apps,
        ]);
    }
}
