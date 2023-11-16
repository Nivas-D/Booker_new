<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 

class LoginController extends Controller {
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo() {
        $user = auth()->user();
        if (in_array($user->role, ['admin','superadmin'])) {
            return 'admin/dashboard';
        } elseif (in_array($user->role, ['user'])) {
            return 'user/dashboard';
        } elseif (in_array($user->role, ['owner'])) {
            return 'owner/dashboard';
        } elseif (in_array($user->role, ['business'])) {
            return 'owner/dashboard';
        } else {
            return '/';
        }
    }
    protected function authenticated(Request $request, $user)
    { 
        // Check if the user has the required role and if their email is verified
        if ($user->role == 'user' && !$user->hasVerifiedEmail()) {
            auth()->logout(); // Log the user out
            
            return back()->with('warning', 'Please verify your email before logging in.');
        }

        // If everything is okay, proceed with the default behavior
        return redirect()->intended($this->redirectPath());
    }
    
}
