<?php

namespace gkinder\Http\Controllers\Web;

use Illuminate\Http\Request;
use gkinder\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function login()
    {
        return view('/login');
    }
}
