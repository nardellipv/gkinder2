<?php

namespace gkinder\Http\Controllers;

use gkinder\Http\Requests\NewsLetterRequest;
use gkinder\NewsLetter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class NewsLetterController extends Controller
{
    public function store(NewsLetterRequest $newsLetterRequest)
    {
        $newsLetter = new newsLetter;
        $newsLetter->email = $newsLetterRequest->email;
        $newsLetter->save();

        Session::flash('message', 'El mail ' . $newsLetter->email . ' fue agregado correctamente');
        return Redirect::to('/login#horizontalTab3');
    }
}
