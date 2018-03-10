<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use gkinder\Comunication;
use gkinder\Message;
use gkinder\Tutor;

class ComunicationController extends Controller
{
    public function index()
    {
        $comunications = Comunication::where('school_id', '=', auth()->user()->school_id)
            ->orderBy('date', 'DESC')
            ->paginate(10);

        return view('school.message.sent', compact('comunications'));
    }


    public function create()
    {
        $tutors = Tutor::where('school_id', '=', auth()->user()->school_id)
            ->orderBy('name', 'ASC')
            ->get();

        return view('school.message.compose', compact('tutors'));
    }

    public function store(Request $request)
    {

        $tutor_id = $request->tutor_id;

        foreach ($tutor_id as $tutor) {
            $comunication = new Comunication();
            $comunication->school_id = auth()->user()->school_id;
            $comunication->date = now();
            $comunication->title = $request['title'];
            $comunication->body = $request['body'];
            $comunication->tutor_id = $tutor;
            $comunication->save();
        }

        Session::flash('message', 'El mensaje <b>' . $comunication->title . '</b> fue enviado correctamente');
        return back();
    }

    public function show($id)
    {
        $comunication = Message::find($id);

        return view('school.message.show-sent', compact('comunication'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, Comunication $comunication)
    {
        //
    }


    public function destroy($id)
    {
        $comunication = Comunication::find($id);
        $comunication->delete();

        Session::flash('message', 'El mensaje <b>' . $comunication->title . '</b> fue eliminado correctamente');
        return redirect('school/correo/enviados');
    }
}
