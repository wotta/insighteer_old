<?php

Route::middleware('auth')->group(function () {
    Route::get('/', 'OverviewController@index')->name('overview');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::namespace('Bank')->prefix('bank')->middleware('auth')->group(function () {
    Route::resource('accounttypes', 'AccountTypeController');
});
