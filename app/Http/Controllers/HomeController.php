<?php

namespace gkinder\Http\Controllers;

use gkinder\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', '=', Auth::User()->id);

        return view('home', [
            'user' => $user,
        ]);
    }
}
