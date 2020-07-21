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
Route::namespace('Dashboard')->prefix('dashboard')->group(function(){

    Route::get('home','HomeController@index');
    
    Route::resource('users','UsersController')->except(['show','delete']);
    Route::delete('users/delete/{id}','UsersController@delete')->name('dashboard/users.delete');

    
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
