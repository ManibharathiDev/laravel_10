<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //echo "I am From CheckAge Middleware";

        if($request->age < 18)
        {
            $result['success'] = 0;
             $result['reason'] = "You are not qualified";
             return response($result);
        }

        return $next($request);
    }
}
