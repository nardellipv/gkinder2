<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use gkinder\Room;
use gkinder\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        //
    }

    public function store(Request $request)
    {
        //
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

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->name = $request['name'];
        $teacher->last_name = $request['last_name'];
        $teacher->phone = $request['phone'];
        $teacher->address = $request['address'];
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
