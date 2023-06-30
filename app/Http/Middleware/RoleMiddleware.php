<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // dd($roles);
        foreach($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if($request->user()->hasRole($role)){
                return $next($request);
            }
        }
        return back()->with('error', 'You are not authorized to perform this action.');
    }
}
