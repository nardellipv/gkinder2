<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use gkinder\Student;
use gkinder\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::where('school_id', '=', auth()->user()->school_id)
            ->get();

        return view('school.tutor.index', compact('tutors'));
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
        $tutor = Tutor::find($id);
        $students = $tutor->students;

        $otherStudent = Student::where('school_id', '=', auth()->user()->school_id)
            ->get();

        return view('school.tutor.show', compact('tutor', 'students', 'otherStudent'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $tutor = Tutor::find($id);
        $tutor->name = $request['name'];
        $tutor->last_name = $request['last_name'];
        $tutor->phone = $request['phone'];
        $tutor->address = $request['address'];
        $tutor->email = $request['email'];
        $tutor->observation = $request['observation'];

        if ($request->student_id) {
            $studentId = Student::find($request->student_id);

            $studentId->tutor_id = $tutor->id;

            $studentId->update();
        }

        $tutor->update();

        Session::flash('message', 'Perfil editado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $tutor = Tutor::find($id);
        $tutor->delete();

        Session::flash('message', 'Profesor <b>' . $tutor->name . ' ' . $tutor->last_name . '</b> eliminado correctamente');
        return back();
    }
}
