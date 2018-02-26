<?php

Route::get('/', function () {
    return redirect()->route('login');
});

//log
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Auth::routes();

Route::post('newsletter', 'School\NewsLetterController@store')->name('newsLetter');

//envio mail
Route::post('sendemail', 'School\SendMailController@ship')->name('sendemail');

//jardin
Route::get('school/home', 'School\HomeController@view')->name('home');
Route::resource('school/salas', 'School\RoomController');
Route::resource('school/estudiantes', 'School\StudentController');
Route::resource('school/calendario', 'School\CalendarController');
