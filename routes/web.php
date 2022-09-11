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
    Route::get('houses/{house}/promotes', 'PromoteController@index')->name('promotes.index');
    Route::get('houses/{house}/promotes/{promote}', 'PromoteController@show')->name('promotes.show');
    Route::post('/checkout', 'PromoteController@payment')->name('promote.payment');
});


//Frontoffice
Route::any("{any}", function() {
    return view('front.home');
})->where('any', '.*');
