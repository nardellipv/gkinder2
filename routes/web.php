<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::post('newsletter', 'NewsLetterController@store')->name('newsLetter');

Route::post('sendemail', 'SendMailController@ship')->name('sendemail');
