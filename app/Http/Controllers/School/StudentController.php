<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use gkinder\Http\Requests\StudentRequest;
use gkinder\Room;
use gkinder\School;
use gkinder\Student;
use gkinder\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($id);
        // $student->name = $request['name'];
        // $student->update();
        $student->fill($request->all())->save();

        $rooms = Room::where('school_id', '=', auth()->user()->school_id)
            ->get();

        $tutors = Tutor::leftjoin('Students', 'students.tutor_id', '=', 'tutors.id')
            ->where('students.school_id', auth()->user()->school_id)
            ->get();

        return view('school.student.show', compact('student', 'rooms', 'tutors'));
    }

    public function destroy($id)
    {
        //
    }
}
