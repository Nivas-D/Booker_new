<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    
}
