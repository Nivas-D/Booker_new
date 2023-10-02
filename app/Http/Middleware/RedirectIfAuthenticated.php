<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {
    public function handle($request, Closure $next, $guard = null){
        if (Auth::guard($guard)->check()) {
            $user = auth()->user();
            if (in_array($user->role, ['admin','superadmin'])) {
                return redirect('admin/dashboard');
            } elseif (in_array($user->role, ['user'])) {
                return redirect('user/dashboard');
            } elseif (in_array($user->role, ['owner'])) {
                return redirect('owner/dashboard');
            } elseif (in_array($user->role, ['business'])) {
                return redirect('business/dashboard');
            } else {
                return redirect('/');
            }
            return redirect('/');
        }
        return $next($request);
    }
}