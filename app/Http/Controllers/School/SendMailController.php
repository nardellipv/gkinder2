<?php

namespace gkinder\Http\Controllers\School;

use gkinder\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use gkinder\Mail\Contact;

class SendMailController extends Controller
{
    public function ship(Request $request)
    {

        $valueArray = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Test mail...

        Mail::to('info@gkinder.com')->send(new Contact($valueArray));
        Session::flash('message', 'Su email fue enviado, le responderemos a la brevedad. Muchas gracias.');
        return Redirect::to('/login#horizontalTab5');
    }
}
