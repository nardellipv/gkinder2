<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Requests\School\TutorUpdateRequest;
use gkinder\Http\Requests\School\TutorStoreRequest;
use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use gkinder\User;
use gkinder\Student;
use gkinder\Tutor;

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
        return view('school.tutor.create');
    }

    public function store(TutorStoreRequest $request)
    {

        //salvar como tutor
        $tutor = new Tutor;

        $tutor->name = $request['nombre'];
        $tutor->last_name = $request['apellido'];
        $tutor->phone = $request['telefono'];
        $tutor->dni = $request['dni'];
        $tutor->email = $request['email'];
        $tutor->address = $request['direccion'];
        $tutor->observation = $request['observation'];
        $tutor->school_id = auth()->user()->school_id;

        $tutor->save();

        //salvar como usuario
        $tutorUser = new User;

        $tutorUser->name = $request['nombre'];
        $tutorUser->email = $request['email'];
        $tutorUser->password = bcrypt($request['password']);
        $tutorUser->school_id = auth()->user()->school_id;
        $tutorUser->user_type = 'TUTOR';

        $tutorUser->save();


        Session::flash('message', 'Tutor <b>' . $tutor->name . ' ' . $tutor->last_name . '</b> creado correctamente');
        return back();
    }

    public function show($id)
    {
        $tutor = Tutor::find($id);
        $students = $tutor->students;

        $otherStudent = Student::where('school_id', '=', auth()->user()->school_id)
            ->get();

        return view('school.tutor.show', compact('tutor', 'students', 'otherStudent'));
    }

    public function update(TutorUpdateRequest $request, $id)
    {
        $tutor = Tutor::find($id);
        $tutor->name = $request['nombre'];
        $tutor->last_name = $request['apellido'];
        $tutor->phone = $request['telefono'];
        $tutor->address = $request['direccion'];
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
