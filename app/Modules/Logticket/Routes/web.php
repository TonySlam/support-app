<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'logticket','middleware' => 'auth'], function () {
    Route::get('/','SupportController@index')->name('index.support');
    Route::get('/show/{id}','SupportController@show')->name('show.support');
    Route::get('/add/{id}','SupportController@create')->name('add.support');
    Route::post('/store','SupportController@store')->name('store.support');
    Route::post('/update/{id}','SupportController@update')->name('update.support');
});

Route::group(['prefix' => 'user-log', 'middleware' => 'auth'], function () {
    Route::get('/{id}','LogTicketController@index')->name('index.log');

    Route::post('/store','LogTicketController@store')->name('store.log');
});

Route::group(['prefix' => 'logged', 'middleware' => 'auth'], function () {
    Route::get('/add/','LogTicketController@create_ticketlog')->name('add.log_ticket');
    Route::get('/logged/{id}', 'ReportDataTableController@viewedByAgent')->name('logged.ticket');
});
