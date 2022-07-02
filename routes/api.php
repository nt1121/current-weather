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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/regions', 'Api\RegionController@getAll');
    Route::get('/regions/{id}', 'Api\RegionController@findById')->where('id', '[1-9][0-9]*');
    Route::get('/prefectures/{id}', 'Api\PrefectureController@findById')->where('id', '[1-9][0-9]*');
});

Route::get('/locations/{id}', 'Api\LocationController@findById')->middleware('throttle:20,1')->where('id', '[1-9][0-9]*');
