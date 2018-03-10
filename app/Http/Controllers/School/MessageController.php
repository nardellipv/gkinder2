<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use gkinder\Message;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {

        $messages = Message::where('school_id', '=', auth()->user()->school_id)
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('school.message.index', compact('messages'));
    }

    public function create()
    {
        dd('dasdas');
    }

    public function store(Request $request)
    {
        dd('dasdas');
    }

    public function show($id)
    {
        $message = Message::find($id);

        return view('school.message.show', compact('message'));
    }

    public function edit($id)
    {
        dd('dasdas');
    }

    public function update(Request $request, $id)
    {
        dd('dasdas');
    }

    public function respond($id)
    {

        $message = Message::find($id);

        return view('school.message.respond', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();

        Session::flash('message', 'El mensaje <b>' . $message->title . '</b> fue eliminado correctamente');
        return redirect('school/mensajes');
    }
}
