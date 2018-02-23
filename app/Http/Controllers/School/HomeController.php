<?php

namespace gkinder\Http\Controllers\School;

use DB;
use gkinder\Calendar;
use gkinder\Http\Controllers\Controller;
use gkinder\Room;
use gkinder\Student;
use gkinder\Teacher;
use gkinder\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
            ->join('rooms', 'rooms.id', '=', 'calendars.room_id')
            ->where('date', '>=', now())
            ->get();

        //counts
        $countStudents = Student::where('school_id', '=', Auth::User()->school_id)
            ->count();

        $countTeachers = Teacher::where('school_id', '=', Auth::User()->school_id)
            ->count();

        $countRooms = Room::where('school_id', '=', Auth::User()->school_id)
            ->count();

        $countEvents = Calendar::where('school_id', '=', Auth::User()->school_id)
            ->where('date', '>=', now())
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
}
