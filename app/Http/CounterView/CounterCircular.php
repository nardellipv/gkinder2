<?php

namespace gkinder\Http\CounterView;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use gkinder\Circular;

class CounterCircular
{

    public function compose(View $view)
    {
        $circular = Circular::where('school_id', '=', Auth::User()->school_id)
            ->where('active', 'YES')
            ->count();

        $view->with('circular', $circular);
    }
}