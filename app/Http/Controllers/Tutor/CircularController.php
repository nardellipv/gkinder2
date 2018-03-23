<?php

namespace gkinder\Http\Controllers\Tutor;

use gkinder\Http\Controllers\Controller;
use gkinder\Circular;

class CircularController extends Controller
{
    public function index()
    {
        $circularesActive = Circular::where('school_id', auth()->user()->school_id)
            ->where('active','YES')
            -> get();

        return view('tutor.circular.index', compact('circularesActive'));
    }
}
