<?php

namespace gkinder\Http\Middleware;

use Closure;
use gkinder\School;
use Illuminate\Support\Facades\Auth;

class ActiveStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $school = School::where('schools.id', '=', Auth::user()->school_id)
            ->first();

        if($school->active == 'DISABLE'){
            return view('/auth/login');
        }

        return $next($request);
    }
}
