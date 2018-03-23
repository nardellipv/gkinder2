<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Requests\School\CircularRequest;
use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use gkinder\Circular;

class CircularController extends Controller
{

    public function index()
    {
        $circularesActive = Circular::where('school_id', auth()->user()->school_id)
            ->where('active','YES')
            -> get();

        $circularesDisable = Circular::where('school_id', auth()->user()->school_id)
            ->where('active','NO')
            -> get();

        return view('school.circular.index', compact('circularesActive', 'circularesDisable'));
    }

    public function create()
    {
        return view('school.circular.create');
    }

    public function store(CircularRequest $request)
    {
        $circular = new Circular;
        $circular->school_id = auth()->user()->school_id;
        $circular->date = now();
        $circular->fill($request->all())->save();

        Session::flash('message', 'Circular creada y publicada correctamente');
        return back();
    }

    public function disable($id)
    {
        $circular = Circular::find($id);
        $circular->active = 'NO';
        $circular->save();

        Session::flash('message', 'Circular '. $circular->title .' despublicada correctamente');
        return back();
    }

    public function active($id)
    {
        $circular = Circular::find($id);
        $circular->active = 'YES';
        $circular->save();

        Session::flash('message', 'Circular ' . $circular->title . ' publicada correctamente');
        return back();
    }

    public function show($id)
    {
        $circular = Circular::find($id);

        return view('school.circular.edit', compact('circular'));
    }

    public function update(CircularRequest $request, $id)
    {
        $circular = Circular::find($id);

        $circular->fill($request->all())->save();

        Session::flash('message', 'Circular ' . $circular->title . ' editada correctamente');
        return back();
    }

    public function destroy($id)
    {
        $circular = Circular::find($id);
        $circular->delete();

        Session::flash('message', 'Circular ' . $circular->title . ' eliminada correctamente');
        return back();
    }
}
