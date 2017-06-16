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
Route::get('/', 'GuestController@index');
Route::get('/search/{id?}', 'GuestController@index');
Route::post('/', 'GuestController@store');

Route::resource('masterfile', 'MasterfileController');
