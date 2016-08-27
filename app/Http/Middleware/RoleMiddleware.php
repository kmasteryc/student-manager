<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $role)
    {
	    if (!in_array($request->user()->role_id, $role)){
		    return redirect()->route('index')->with('error','Permission denied!');
	    }
        return $next($request);
    }
}
