<?php

namespace gkinder\Http\Controllers\Tutor;

use gkinder\Http\Controllers\Controller;
use gkinder\Student;
use gkinder\Tutor;
use Jenssegers\Date\Date;
use gkinder\Calendar;


class CalendarController extends Controller
{
    public function __construct()
    {
        Date::setLocale('es');
    }

    public function index()
    {
        $tutorId = Tutor::where('email', auth()->user()->email)
            ->first();

        $students = Student::where('tutor_id', $tutorId->id)
            ->first();

        if ($students != null) {
            $calendars = Calendar::where('school_id', auth()->user()->school_id)
                ->where('room_id', $students->room_id)
                ->get();

            return view('tutor.eventos.index', compact('calendars'));
        }

        return view('tutor.eventos.index');
    }

}
