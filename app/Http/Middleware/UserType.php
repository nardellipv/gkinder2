<?php

namespace gkinder\Http\Middleware;

use Closure;
use gkinder\User;
use Illuminate\Support\Facades\Auth;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userType = User::where('id', Auth::user()->id)
            ->first();

        if($userType->user_type == 'TUTOR'){
            return redirect('/tutor/home');
        }else{

            return $next($request);
        }

    }
}
