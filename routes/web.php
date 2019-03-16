<?php

Auth::routes();

Route::get('/', 'InfoController@index')->name('info');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'home', 'middleware' => 'auth:api'], function (){

	Route::get('/data', 'HomeController@view');
	Route::apiResource('event', 'EventController');

});

