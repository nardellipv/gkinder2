<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use gkinder\Room;
use gkinder\Teacher;
use gkinder\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {

    }

    public function create()
    {
        $teachers = Teacher::where('school_id', '=', Auth::User()->school_id)
            ->get();

        return view('school.room.create', compact('teachers'));
    }

    public function store(Request $request)
    {

        $room = new Room;
        $room->name = $request['nombre'];
        $room->school_id = auth()->user()->school_id;

        $room->save();


        if(!empty($request->teacher_id)){

            $teacher = Teacher::find($request['teacher_id']);
            $room = Room::where('school_id', '=' ,auth()->user()->school_id)->get();

            $teacher->room_id = $room->last()->id;
            $teacher->update();
        }

        return Redirect::to('school/home');
    }

    public function show($id)
    {
        $room = Room::find($id);

        $teachers = Teacher::where('school_id', '=', Auth::User()->school_id)
            ->get();

        return view('school.room.edit', [
            'room' => $room,
            'teachers' => $teachers,
        ]);
    }

    public function edit($id)
    {
        $room = Room::find($id)
            ->get();

        return view('school.room.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {

        $room = Room::find($id);
        $room->name = $request['nombre'];

        $room->update();

        $teacherRoom = Teacher::where('room_id', $id)->first();
        if ($teacherRoom > '1') {
            $teacherRoom->room_id = NULL;
            $teacherRoom->update();
        }

        $teacher = Teacher::find($request['teacher_id']);
        $teacher->room_id = $id;

        $teacher->update();

        return Redirect::to('school/home');
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();

        return Back();
    }
}
