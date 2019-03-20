<?php

Route::get('home', 'HomeController@index');

Route::get('data', 'HomeController@view');

Route::post('event', 'EventController@store');

Route::patch('event/{id}', 'EventController@update');

Route::delete('event/{id}', 'EventController@destroy');