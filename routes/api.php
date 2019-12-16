<?php

use Illuminate\Http\Request;

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

Route::post('login', 'Api\AuthApiController@login');
Route::post('register', 'Api\AuthApiController@register');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('events/getEventsByDate?date={date}', 'Api\EventApiController@getEventsByDate');
    Route::post('events/registerOnEvent', 'Api\EventApiController@registerOnEvent');

    Route::get('news/index?limit={limit}&offset={offset}', 'Api\NewsApiController@index');
    
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
