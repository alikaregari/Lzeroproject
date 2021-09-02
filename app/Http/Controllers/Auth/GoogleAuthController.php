<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\Models\User;
use App\Notifications\ActiveCodeNotification;
use App\Notifications\LoginToWebsiteNotification as LoginToWebsiteNotification;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(Request $request){
        try {
            $google_user = Socialite::driver('google')->user();
            $user= User::where('email',$google_user->email)->first();
            if (! $user){
                $user = $this->createUser($google_user);
                $user->markEmailAsVerified();
            }
            auth()->loginUsingId($user->id);
            if (auth()->user()->Check_TowFactor_Enable()):
                $this->CreateSession($request, $user);
                $code=ActivationCode::GenerationCode();
                auth()->user()->notify(new ActiveCodeNotification($code,auth()->user()->phone_number));
                auth()->logout();
                return redirect(route('login_token'));
            endif;
            //$user->notify(new LoginToWebsiteNotification());
            return redirect(route('index'));
        }
        catch (\Exception $e){
            alert()->warning('ورود شما توسط گوگل به مشکل خورده است','متاسفیم !');
            return redirect(route('login'));
        }

    }

    /**
     * @param \Laravel\Socialite\Contracts\User $google_user
     * @return mixed
     */
    private function createUser(\Laravel\Socialite\Contracts\User $google_user)
    {
        $user = User::create([
            'name' => $google_user->name,
            'email' => $google_user->email,
            'password' => \Str::random(16),
        ]);
        return $user;
    }

    /**
     * @param Request $request
     * @param $user
     */
    private function CreateSession(Request $request, $user): void
    {
        $request->session()->flash('auth', [
            'user_id' => $user->id,
            'using_sms' => false,
            'remember' => $request->has('remember'),
        ]);
    }

}
