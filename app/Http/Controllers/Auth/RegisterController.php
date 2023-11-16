<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Mail;
use App\Mail\UseremailverificationMail;


class RegisterController extends Controller{
    use RegistersUsers;
    protected $redirectTo = '/';
    public function __construct(){
        $this->middleware('guest');
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
            return 'business/dashboard';
        } else {
            return '/';
        }
    }
    public function register(Request $request)
    {
        $validator =  $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'user_type' => ['required'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        // if ($validator) {
        //     // $this->throwValidationException(
        //     //     $request, $validator
        //     // );
        // };
        $user = User::create([
            'name'=>$request['first_name'].' '.$request['last_name'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'role_id' => 3,
            'role' => 'user',
            'password' => Hash::make($request['password']),
        ]);
        $createdId = $user->id;
        $verificationUrl = route('verification.verify', ['token' =>base64_encode($createdId)]);
        $mailData = [
            "name" => $request['first_name'].' '.$request['last_name'],
            "title" => "User Verification",
            "link" => $verificationUrl
        ];
        $isEmailed = Mail::to($request->input("email"))->send(
            new UseremailverificationMail($mailData)
        );
        return redirect()->route("public.home")->with('success', 'Registration successful! Please verify your email. A link has been sent to your email');
    }
    protected function validator(array $data){

        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'user_type' => ['required'],
        //     'password' => ['required', 'string', 'min:6', 'confirmed'],
        // ]);
        
         return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'user_type' => ['required'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    protected function create(array $data){
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'role_id' => $data['user_type'],
        //     'password' => Hash::make($data['password']),
        // ]);
        return User::create([
            'name'=>$data['first_name'].' '.$data['last_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'role_id' => 3,
            'role' => 'user',
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function registered(Request $request, $user)
    {
        // Manually log in the user after registration
        // auth()->login($user);

        // Display a custom message or redirect to a specific route
        // return redirect()->route("public.home")->with('success', 'Registration successful!');
    }
}
