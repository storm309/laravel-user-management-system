<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($course = $request->input('course')) {
            if ($course === 'laravel') {
                return $next($request);
            }
            return response('Unauthorized: Invalid course', 401);
        }
        return response('Unauthorized: Course not provided', 401);
    }

}
