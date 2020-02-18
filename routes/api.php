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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/token', 'Api\Auth\RequestAccessTokenController@getToken');
Route::post('/auth/token/refresh', 'Api\Auth\RefreshAccessTokenController@refreshToken');

Route::apiResource('/hotels', 'Api\HotelsController');
Route::apiResource('/hotels/{hotel}/room-types', 'Api\RoomTypesController');
Route::get('/hotels/{hotel}/rooms/search', 'Api\SearchRoomsController@search');
Route::apiResource('/hotels/{hotel}/rooms', 'Api\RoomsController');
Route::apiResource('/countries', 'Api\CountriesController');



