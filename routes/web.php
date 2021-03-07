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

Route::redirect('/', 'http://localhost/PlayStore/public/apps');

Auth::routes();

Route::get('/apps', 'HomeController@index')->name('home');
Route::get('/apps/image/{filename}', 'ApplicationController@getImage')->name('app.image');

Route::get('/newApp/category', 'CategoryController@newCategory')->name('newApp.category');
Route::post('/newApp/category/save', 'CategoryController@save')->name('newApp.category.save');

Route::get('/newApp/content/{id}', 'ApplicationController@newContent')->name('newApp.content');
Route::post('/newApp/content/save', 'ApplicationController@save')->name('newApp.content.save');

Route::get('/newApp/calification/{id}', 'CalificationController@index')->name('newApp.calification');





