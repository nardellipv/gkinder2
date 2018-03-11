<?php

namespace gkinder\Http\Controllers\School;

use DB;
use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use gkinder\Http\Middleware\ActiveStatus;
use Jenssegers\Date\Date;
use gkinder\Calendar;
use gkinder\Student;
use gkinder\Room;
use gkinder\Teacher;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function view()
    {
        $rooms = Room::leftjoin('teachers', 'teachers.room_id', '=', 'rooms.id')
            ->leftjoin('students', 'students.room_id', '=', 'rooms.id')
            ->select('rooms.id', 'rooms.name as name', 'rooms.created_at', 'teachers.name as nameTeacher', 'teachers.room_id', 'students.room_id',
                DB::raw('COUNT(students.room_id) as cantidad'))
            ->where('rooms.school_id', '=', Auth::User()->school_id)
            ->groupBy('rooms.id')
            ->get();

        $nextEvents = Calendar::where('calendars.school_id', '=', Auth::User()->school_id)
            ->where('date_start', '>=', Date::now()->sub('1 day'))
            ->get();

        //counts
        $countStudents = Student::where('school_id', '=', Auth::User()->school_id)
            ->count();

        $countTeachers = Teacher::where('school_id', '=', Auth::User()->school_id)
            ->count();

        $countRooms = Room::where('school_id', '=', Auth::User()->school_id)
            ->count();

        $countEvents = Calendar::where('school_id', '=', Auth::User()->school_id)
            ->where('date_start', '>=', now())
            ->count();

        return view('school.home', [
            'rooms' => $rooms,
            'nextEvents' => $nextEvents,
            'countStudents' => $countStudents,
            'countTeachers' => $countTeachers,
            'countRooms' => $countRooms,
            'countEvents' => $countEvents,
        ]);
    }

    public function create()
    {
        $teachers = Teacher::where('school_id', '=', Auth::User()->school_id)
            ->get();

        return view('school.home', compact('teachers'));
    }
}
