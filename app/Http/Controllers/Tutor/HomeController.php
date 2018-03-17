<?php

namespace gkinder\Http\Controllers\Tutor;

use gkinder\School;
use gkinder\Student;
use Illuminate\Http\Request;
use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;
use gkinder\Calendar;


class HomeController extends Controller
{
    public function view()
    {
        $nextEvents = Calendar::where('calendars.school_id', '=', Auth::User()->school_id)
            ->where('date_start', '>=', Date::now()->sub('1 day'))
            ->get();

        $students = Student::where('tutor_id', Auth::user()->id)
            ->get();

        $school = School::where('id', Auth::user()->school_id)
            ->first();

        return view('tutor.home', compact('nextEvents','students', 'school'));
    }
}
