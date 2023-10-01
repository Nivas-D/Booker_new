<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$roles)
    {
        // return $next(auth()->user());
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = auth()->user();

            // Check if the user's role is in the list of specified roles
            if (in_array($user->role, $roles)) {
                return $next($request);
            }
        }
    
        return abort(403, 'Unauthorized');
    }
}
