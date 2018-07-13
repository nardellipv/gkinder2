<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Requests\School\CalendarStoreRequest;
use gkinder\Http\Controllers\Controller;
use gkinder\Http\Requests\School\CalendarUpdateRequest;
use Illuminate\Support\Facades\Session;
use Jenssegers\Date\Date;
use gkinder\Calendar;
use gkinder\Room;

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

    public function store(CalendarStoreRequest $request)
    {
//       dd($request->all());

        $date_start = substr($request->date_range, 0, 16);
        $date_end = substr($request->date_range, 22, 16);


//dd($date_end);

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


    public function update(CalendarUpdateRequest $request, $id)
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
