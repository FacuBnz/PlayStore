<?php

use App\Application;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

//     $applications = Application::all();
//     $users = User::all();
//     $categories = Category::all();


//     return view('welcome', [
//         'apps' => $applications,
//         'users'=> $users,
//         'categories' =>$categories,

//     ]);
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
