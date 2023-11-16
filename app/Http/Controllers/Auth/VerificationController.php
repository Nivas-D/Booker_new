<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use App\Models\User;

class VerificationController extends Controller {
    use VerifiesEmails;
    protected $redirectTo = '/dashboard';
    public function __construct(){
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify($token)
    {   
        $userId = base64_decode($token);
        $user = User::find($userId);
        if ($user) {
            // Check if the user is already verified
            if (!$user->hasVerifiedEmail()) {
                // Verify the user's email
                $user->markEmailAsVerified();
    
                // Dispatch the event for email verification
                event(new Verified($user));
    
                // Optionally, you can redirect the user to a success page
                // return redirect('/email-verified');
                return redirect()->route("public.home")->with('success', 'Email verified successfully please login to accces your account');
                
            }
    
            // If the email is already verified, you can redirect or show a message
            // return redirect('/already-verified');
            return redirect()->route("public.home")->with('warning', 'Your Email is already verified');
        }
    
        // If the user is not found, you can handle it accordingly (e.g., show an error page)
        return redirect()->route("public.home")->with('error', 'Not found, something went wrong..');
        // Find the user by the token and update the verification status
    }
}
