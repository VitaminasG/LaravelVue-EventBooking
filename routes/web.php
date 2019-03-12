<?php

Auth::routes();

Route::get('/', 'InfoController@index')->name('info');
Route::get('/home', 'HomeController@index')->name('home');