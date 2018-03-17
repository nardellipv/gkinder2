<?php

namespace gkinder\Http\Controllers\Tutor;

use gkinder\Http\Requests\Tutor\MessageRequest;
use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use gkinder\Comunication;
use gkinder\Message;
use gkinder\School;
use gkinder\Tutor;

class MessageController extends Controller
{
    public function index()
    {

        $tutorId = Tutor::where('email', Auth::user()->email)
            ->first();

        $messages = Comunication::where('tutor_id', $tutorId->id)
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('tutor.message.index', compact('messages'));
    }

    public function create()
    {
        $school = School::where('id', Auth::user()->school_id)
            ->first();

        return view('tutor.message.compose', compact('school'));
    }

    public function store(MessageRequest $request)
    {

        $tutorId = Tutor::where('email', Auth::user()->email)
            ->first();

        $message = new Message;
        $message->school_id = auth()->user()->school_id;
        $message->title = $request['subject'];
        $message->body = $request['body'];
        $message->read = 'NOREAD';
        $message->date = now();
        $message->tutor_id = $tutorId->id;

        $message->save();

        Session::flash('message', 'El mensaje <b>' . $message->title . '</b> fue enviado correctamente');
        return back();
    }

    public function show($id)
    {
        $message = Comunication::find($id);

        $message->read = 'READ';
        $message->update();

        return view('tutor.message.show', compact('message'));
    }

    public function update(MessageRequest $request, $id)
    {

        $tutorId = Tutor::where('email', Auth::user()->email)
            ->first();

        $comunication = Comunication::find($id);

        $comunication->fill($request->all())->save();


        $message = new Message;

        $message->title = $request['subject'];
        $message->body = $request['body'];
        $message->date = now();
        $message->school_id = auth()->user()->school_id;
        $message->read = 'NOREAD';
        $message->tutor_id = $tutorId->id;
        $message->save();


        Session::flash('message', 'La respuesta <b>' . $message->title . '</b> fue enviada correctamente');
        return back();
    }

    public function respond($id)
    {

        $message = Comunication::find($id);

        return view('tutor.message.respond', compact('message'));
    }

}
