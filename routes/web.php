<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function (){
    Route::resource('menus' , 'MenuController');
    Route::get("/change-password",'UserController@changePassword')->name("change-password");
    Route::put("/change-password",'UserController@postChangePassword')->name("post-change-password");


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
