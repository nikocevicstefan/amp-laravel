<?php

namespace App\Http\Middleware;

use Closure;

class PasswordFilter
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
        if(!empty($request->header('X-Password'))){
            if($request->header('X-Password') === 'Fortuna Major'){
                return $next($request);
            }
            abort(401, 'Incorrect Password');
        }
        abort(401, 'Incorrect Password');
    }
}
