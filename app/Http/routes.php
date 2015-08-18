<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('prefix' => 'api/v1/'), function () {

    Route::get('index', 'Rest\RestController@index');
    Route::get('show/{id}', 'Rest\RestController@show');
    Route::post('store', 'Rest\RestController@store');
    Route::put('update/{id}', 'Rest\RestController@update');
    Route::delete('delete/{id}', 'Rest\RestController@destroy');
});
