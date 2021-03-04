<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

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
        $apps = Application::orderBy('id', 'desc')->paginate(6);

        return view('home', [
            'apps' => $apps,
        ]);
    }
}
