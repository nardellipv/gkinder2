<?php

namespace gkinder\Http\Controllers;

use gkinder\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

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

        Mail::to('example@gmail.com')->send(new Contact($valueArray));
        return Redirect::to('/login');
    }
}
