<?php


namespace app\Http\Controllers\Auth;

use App\Models\ActivationCode;
use App\Notifications\ActiveCodeNotification;
use App\Notifications\LoginToWebsiteNotification as LoginToWebsiteNotification;
use Illuminate\Http\Request;

trait TwoFactorAuthenticate
{
public function logging(Request $request, $user){
    if (auth()->user()->Check_TowFactor_Enable()):
      return $this->LogoutAndRedirectToTokenAuth($request,$user);
    endif;
    //$user->notify(new LoginToWebsiteNotification());
    return false;
}
protected function LogoutAndRedirectToTokenAuth(Request $request,$user){
    $this->Redirect_To_Token_Validation($request, $user);
    $code=ActivationCode::GenerationCode();
    if ($user->Check_TowFactor_Sms_Type()):
        $request->user()->notify(new ActiveCodeNotification($code,auth()->user()->phone_number));
    endif;
    auth()->logout();
    return redirect(route('login_token'));
}

    /**
     * @param Request $request
     * @param $user
     */
    private function Redirect_To_Token_Validation(Request $request, $user): void
    {
        $request->session()->flash('auth', [
            'user_id' => $user->id,
            'using_sms' => false,
            'remember' => $request->has('remember'),
        ]);
    }
}
