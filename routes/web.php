<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('school/home', 'School\HomeController@view')->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::post('newsletter', 'School\NewsLetterController@store')->name('newsLetter');

Route::post('sendemail', 'School\SendMailController@ship')->name('sendemail');
