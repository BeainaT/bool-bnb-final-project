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
Auth::routes();

//Backoffice
Route::middleware('auth')
->namespace('User')
->name('user.')
->prefix('user')
->group(function() {
    Route::get('/home', 'HomeController@index')->name('dashboard');
    Route::resource('houses', 'HouseController');
    Route::get('messages/{house?}', 'MessageController@index')->name('messages.index');
    Route::delete('messages/{message}', 'MessageController@destroy')->name('messages.destroy');
    Route::get('promotes', 'PromoteController@index')->name('promotes.index');
});


//Frontoffice
Route::any("{any}", function() {
    return view('front.home');
})->where('any', '.*');
