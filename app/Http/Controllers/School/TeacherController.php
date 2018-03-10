<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Requests\School\TeacherStoreRequest;
use gkinder\Http\Requests\School\TeacherUpdateRequest;
use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use gkinder\Room;
use gkinder\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::where('school_id', '=', auth()->user()->school_id)
            ->get();

        return view('school.teacher.index', compact('teachers'));
    }

    public function create()
    {
        $rooms = Room::where('school_id', '=', auth()->user()->school_id)
            ->get();

        return view('school.teacher.create', compact('rooms'));
    }

    public function store(TeacherStoreRequest $request)
    {

        $teacher = new Teacher;
        $teacher->name = $request['nombre'];
        $teacher->last_name = $request['apellido'];
        $teacher->phone = $request['telefono'];
        $teacher->address = $request['direccion'];
        $teacher->email = $request['email'];
        $teacher->room_id = $request['room_id'];
        $teacher->observation = $request['observation'];
        $teacher->school_id = auth()->user()->school_id;

        if ($request->file) {

            $path = Storage::disk('public')->put('fotos/profesores', $request->file);
            $teacher->photo = $path;
        }
        $teacher->save();

        Session::flash('message', 'Profesor <b>' . $teacher->name . ' ' . $teacher->last_name . '</b> creado correctamente');
        return back();
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);

        $rooms = Room::where('school_id', '=', auth()->user()->school_id)
            ->get();

        return view('school.teacher.show', compact('teacher', 'rooms'));
    }

    public function edit($id)
    {
        //
    }

    public function update(TeacherUpdateRequest $request, $id)
    {
        $teacher = Teacher::find($id);

        $teacher->name = $request['nombre'];
        $teacher->last_name = $request['apellido'];
        $teacher->phone = $request['telefono'];
        $teacher->address = $request['direccion'];
        $teacher->email = $request['email'];
        $teacher->room_id = $request['room_id'];
        $teacher->observation = $request['observation'];

        if ($request->file) {

            $path = Storage::disk('public')->put('fotos/profesores', $request->file);
            $teacher->photo = $path;
        }
        $teacher->update();

        Session::flash('message', 'Perfil editado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        Session::flash('message', 'Profesor <b>' . $teacher->name . ' ' . $teacher->last_name . '</b> eliminado correctamente');
        return back();
    }
}
