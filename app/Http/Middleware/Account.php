<?php

namespace gkinder\Http\Middleware;

use Closure;
use gkinder\School;
use Jenssegers\Date\Date;

class Account
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

        $account = School::where('id', auth()->user()->school_id)
            ->first();

        $diff = $account->created_at->diff(now())->days;

        if ($account->account == 'TEST' && $diff >= 60) {
            dd("tu cuenta se vencio");
        }

        return $next($request);
    }
}
