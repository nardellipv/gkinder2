<?php

namespace gkinder\Http\Controllers;

use gkinder\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
