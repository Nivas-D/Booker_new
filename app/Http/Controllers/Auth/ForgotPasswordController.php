<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller {
    use SendsPasswordResetEmails;

    public function __construct(){
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(\Illuminate\Http\Request $request){
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }
}
