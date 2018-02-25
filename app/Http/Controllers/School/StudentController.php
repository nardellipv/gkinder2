<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use gkinder\Room;
use gkinder\School;
use gkinder\Student;
use gkinder\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $students = Student::where('school_id', '=', auth()->user()->school_id)
            ->get();

        return view('school.student.index', compact('students'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $student = Student::find($id);

        $rooms = Room::where('school_id', '=', auth()->user()->school_id)
            ->get();

        $tutors = Tutor::leftjoin('Students', 'students.tutor_id', '=', 'tutors.id')
            ->where('students.school_id', auth()->user()->school_id)
            ->get();

        return view('school.student.show', compact('student', 'rooms', 'tutors'));

    }

    public function edit($id)
    {
        $students = Student::find($id)
            ->get();

        return view('school.student.show', compact('students'));
    }

    public function update(Request $request, $id)
    {

        $student = Student::find($id);
        $student->name = $request['name'];
        $student->last_name = $request['last_name'];
        $student->dni = $request['dni'];
        $student->birth_date = $request['fecha'];
        $student->room_id = $request['room_id'];
        $student->tutor_id = $request['tutor_id'];
        $student->observation = $request['observation'];
        $student->update();

        $rooms = Room::where('school_id', '=', auth()->user()->school_id)
            ->get();

        $tutors = Tutor::where('school_id', '=', auth()->user()->school_id)
            ->get();

        Session::flash('message', 'Perfil editado correctamente');
        return view('school.student.show', compact('student', 'rooms', 'tutors'));
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        Session::flash('message', 'Alumno <b>' . $student->name . ' ' . $student->lastname . '</b> eliminado correctamente');
        return view('school.student.show');
    }
}