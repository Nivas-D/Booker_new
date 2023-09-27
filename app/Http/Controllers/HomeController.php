<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $user = Auth::user();
        if($user->role_id == 1){
            return redirect('admin/dashboard');
        }
        else if($user->role_id == 2){
            return redirect('owner/dashboard');
        }
        else if($user->role_id == 3){
            return redirect('user/dashboard');
        }
    }
}