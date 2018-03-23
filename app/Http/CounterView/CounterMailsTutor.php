<?php

namespace gkinder\Http\CounterView;

use Illuminate\Support\Facades\Auth;
use gkinder\Comunication;
use Illuminate\View\View;
use gkinder\Tutor;

class CounterMailsTutor
{
    public function compose(View $view)
    {
        $tutorId = Tutor::where('email', Auth::user()->email)
            ->first();
        $messageTutor = Comunication::where('tutor_id', $tutorId->id)
            ->where('read', 'NOREAD')
            ->count();
        $view->with('messageTutor', $messageTutor);
    }
}