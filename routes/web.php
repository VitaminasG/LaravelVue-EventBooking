<?php

Auth::routes();

Route::get('/', 'InfoController@index')->name('info');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/user', 'HomeController@data');
Route::get('/home/collect', 'HomeController@dummy');