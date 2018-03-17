<?php

Route::get('/', function () {
    return redirect()->route('login');
});

//log
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
//------------

Route::post('newsletter', 'School\NewsLetterController@store')->name('newsLetter');

//envio mail
Route::post('sendemail', 'School\SendMailController@ship')->name('sendemail');

Auth::routes();

//jardin
Route::middleware(['auth','ActiveStatus','UserType'])->group(function () {

    Route::get('school/home', 'School\HomeController@view')->name('home');
    Route::resource('school/salas', 'School\RoomController');

    Route::resource('school/estudiantes', 'School\StudentController');
    Route::resource('school/profesores', 'School\TeacherController');
    Route::resource('school/tutores', 'School\TutorController');

    Route::resource('school/calendario', 'School\CalendarController');

    Route::patch('school/perfil/actualizar/colegio/{id}', 'School\SchoolController@updateSchool')->name('actualizar.colegio');
    Route::patch('school/perfil/actualizar/usuario/{id}', 'School\SchoolController@updateUser')->name('actualizar.usuario');
    Route::resource('school/perfil', 'School\SchoolController');

    Route::resource('school/mensajes', 'School\MessageController');
    Route::get('school/mensajes/responder/{id}', 'School\MessageController@respond')->name('responder');

    Route::resource('school/correo/enviados', 'School\ComunicationController');

    Route::resource('calendario', 'School\CalendarController');

});



//tutor
Route::middleware(['auth'])->group(function () {

    Route::get('tutor/home', 'Tutor\HomeController@view')->name('home');

    Route::resource('tutor/mensajes', 'Tutor\MessageController');
    Route::get('tutor/mensajes/responder/{id}', 'Tutor\MessageController@respond')->name('responder');

    Route::resource('tutor/eventos', 'Tutor\CalendarController');

});