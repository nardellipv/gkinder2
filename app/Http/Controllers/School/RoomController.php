<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use gkinder\Room;
use gkinder\Teacher;
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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $rooms = Room::find($id);

        $teachers = Teacher::where('teachers.school_id', '=', Auth::User()->school_id)
            ->where('room_id', '!=', $rooms->id)
            ->get();

        return view('school.room.edit', [
            'rooms' => $rooms,
            'teachers' => $teachers,
        ]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        $room->name = $request['name'];
        $room->update();

        return Redirect::to('school/home');
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();

        return Back();
    }
}
