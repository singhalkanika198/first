<?php

namespace App\Http\Middleware;

use Closure;

class logQueries
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd("Hi"); // Added this dump and die. Middleware runs handle method to check the request.
        //return redirect("/projects");
        return $next($request);
    }
}
