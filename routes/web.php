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

    Route::resource('tours','ToursController')->except(['show','delete']);
    Route::delete('tours/delete/{id}','ToursController@delete')->name('dashboard/tours.delete');

    Route::delete('image/delete/{id}','ToursController@deleteImage')->name('dashboard/image.delete');
    Route::delete('program/delete/{id}','ToursController@deleteProgram')->name('dashboard/program.delete');


    Route::resource('customers','CustomersController')->except(['show','delete']);
    Route::delete('customers/delete/{id}','CustomersController@delete')->name('dashboard/customers.delete');

    
});

 Route::get('/book', function () {
     return view('bookingCancel');
 });

///////////////////// Index show //////////////////
Route::get('/','TourController@index');
Route::get('/tourDetails/{id}','TourController@show');
Route::post('/search','TourController@search');
Route::post('/cancel','TourController@cancel');
Route::get('/book', function () {
    return view('bookingCancel'); // for showing Cancel Page
});
////////////////////////////////


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
