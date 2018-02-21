<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::post('newsletter', 'NewsLetterController@store')->name('newsLetter');

/* Route::get('email', function () {
Mail::to('nardellipv@gmail.com')->send(new Contact());
return view('login');
})->name('email'); */
Route::post('sendemail', 'SendMailController@ship')->name('sendemail');
