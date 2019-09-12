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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/','EngineController@index');
Route::get('/getAll','EngineController@getAll');
Route::get('/getOne','EngineController@getOne');
Route::post('/save','EngineController@save');
Route::post('/update','EngineController@update');
Route::post('/delete','EngineController@delete');