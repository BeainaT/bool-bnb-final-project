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

Route::middleware('auth')
->namespace('User')
->name('user.')
->prefix('user')
->group(function() {
    Route::get('/home', 'HomeController@index')->name('dashboard');
    Route::resource('houses', 'HouseController');
});

Route::any("{any}", function() {
    return view('front.home');
})->where('any', '.*');
