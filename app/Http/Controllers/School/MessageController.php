<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Requests\School\MessageRequest;
use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use gkinder\Comunication;
use gkinder\Message;

class MessageController extends Controller
{
    public function index()
    {

        $messages = Message::where('school_id', '=', auth()->user()->school_id)
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('school.message.index', compact('messages'));
    }


    public function show($id)
    {
        $message = Message::find($id);

        $message->read = 'READ';
        $message->update();

        return view('school.message.show', compact('message'));
    }


    public function update(MessageRequest $request, $id)
    {

        $message = Message::find($id);

        $message->fill($request->all())->save();


        $comunication = new Comunication;

        $comunication->title = $request['subject'];
        $comunication->body = $request['body'];
        $comunication->date = now();
        $comunication->school_id = auth()->user()->school_id;
        $comunication->read = 'NOREAD';
        $comunication->tutor_id = $message->tutor_id;
        $comunication->save();


        Session::flash('message', 'La respuesta <b>' . $message->title . '</b> fue enviada correctamente');
        return back();
    }

    public function respond($id)
    {

        $message = Message::find($id);

        return view('school.message.respond', compact('message'));
    }

    public function destroy($id)
    {

        $message = Message::find($id);

        if ($message != null) {

            $message->delete();

            Session::flash('message', 'El mensaje <b>' . $message->title . '</b> fue eliminado correctamente');
            return redirect('school/mensajes');
        }

        Session::flash('message', 'El mensaje NO puede ser eliminado');
        return redirect('school/correo/enviados');
    }
}
