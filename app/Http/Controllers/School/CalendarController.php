<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Room;
use Illuminate\Support\Facades\Session;
use gkinder\Http\Controllers\Controller;
use Illuminate\Http\Request;
use gkinder\Calendar;
use Jenssegers\Date\Date;

class CalendarController extends Controller
{

    public  function __construct()
    {
        Date::setLocale('es');
    }

    public function index()
    {
        $calendars = Calendar::where('school_id', auth()->user()->school_id)
            ->get();

        $calendarsEdit = Calendar::where('school_id', auth()->user()->school_id)
            ->where('date_start', '>=', now())
            ->orderBy('date_start', 'ASC')
            ->get();

        return view('school.calendar.index', compact('calendars', 'calendarsEdit'));
    }

    public function create()
    {
        $rooms = Room::where('school_id', auth()->user()->school_id)
            ->get();

        return view('school.calendar.create', compact('rooms'));
    }

    public function store(Request $request)
    {

        $date_start = substr($request->date_range, 0, 19);
        $date_end = substr($request->date_range, 21, 41);


        $calendar = new Calendar;
        $calendar->activity = $request['activity'];
        $calendar->description = $request['description'];
        $calendar->date_start = $date_start;
        $calendar->date_end = $date_end;
        $calendar->room_id = $request['room_id'];
        $calendar->school_id = auth()->user()->school_id;

        $calendar->save();

        Session::flash('message', 'El evento <b>' . $calendar->activity . '</b> fue creado correctamente');
        return back();
    }

    public function show($id)
    {
        $calendar = Calendar::find($id);

        $rooms = Room::where('school_id', auth()->user()->school_id)
            ->get();

        return view('school.calendar.edit', compact('calendar','rooms'));
    }

    public function update(Request $request, $id)
    {

        $calendar = Calendar::find($id);

        $calendar->fill($request->all())->update();

        Session::flash('message', 'Evento <b>' . $calendar->activity . '</b> editado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $calendar = Calendar::find($id);
        $calendar->delete();

        Session::flash('message', 'Evento <b>' . $calendar->activity . '</b> eliminado correctamente');
        return back();
    }
}
