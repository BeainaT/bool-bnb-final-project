<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('houses', 'Api\HouseController@index');

Route::post('houses/show', 'Api\HouseController@show');

Route::get('houses/details/{id}', 'Api\HouseController@houseDetails');

Route::post('messages/{house_id}', 'Api\MessageController@store');

Route::get('services', 'Api\ServiceController@index');
