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
// Route::namespace('Backend')->prefix('dashboard')->middleware('admin')->group(function(){
Route::namespace('Dashboard')->prefix('dashboard')->middleware('admin')->group(function(){

    Route::get('home','HomeController@index');
    
    Route::resource('users','UsersController')->except(['show','delete']);
    Route::delete('users/delete/{id}','UsersController@delete')->name('dashboard/users.delete');

    Route::resource('tours','ToursController')->except(['show','delete']);
    Route::delete('tours/delete/{id}','ToursController@delete')->name('dashboard/tours.delete');

    Route::resource('programs','ProgramsController')->except(['show','delete']);
    Route::delete('programs/delete/{id}','ProgramsController@delete')->name('dashboard/tours.delete');

    Route::delete('image/delete/{id}','ToursController@deleteImage')->name('dashboard/image.delete');
    Route::get('program/{id}','ToursController@updateProgram')->name('dashboard/program.update');


    Route::resource('customers','CustomersController')->except(['show','delete']);
    Route::delete('customers/delete/{id}','CustomersController@delete')->name('dashboard/customers.delete');

    
});



///////////////////// abadeer _ zeinb //////////////////
Route::get('/book/cancel', function () {
    return view('bookingCancel');
});
Route::get('/','TourController@index');
Route::get('/tourDetails/{id}','TourController@show');
Route::post('/search','TourController@search');
Route::post('/cancel','TourController@cancel');
Route::get('/cancelData','TourController@ajaxRequest');
Route::post('/book/store/{id}','TourController@booking')->name('book.save');
Route::get('/book/{id}','TourController@getBooking'); 


////////////////////////////////


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
