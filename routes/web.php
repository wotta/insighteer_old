<?php

Route::middleware('auth')->group(function () {
    Route::get('/', 'OverviewController@index')->name('overview');
    Route::get('/home', 'HomeController@index')->name('home');
});
