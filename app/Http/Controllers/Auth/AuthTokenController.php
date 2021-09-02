<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\Models\User;
use App\Notifications\LoginToWebsiteNotification as LoginToWebsiteNotification;
use Illuminate\Http\Request;

class AuthTokenController extends Controller
{
    public function Get_Token(Request $request){
        if (! $request->session()->has('auth')){
            return redirect(route('login'));
        }
        $request->session()->reflash();
        return view('auth.token');
    }
    public function Post_Token(Request $request){
        $request->session()->reflash();
        if (! $request->session()->has('auth')){
            return redirect(route('login'));
        }
        $data=$request->validate([
            'token'=>'required',
        ]);
        $user=User::findOrFail($request->session()->get('auth.user_id'));
        $status=ActivationCode::VerifyCode($data['token'],$user);
        if ($status==true):
            $user->ActivationCode()->delete();
            $user->notify(new LoginToWebsiteNotification());
            auth()->loginUsingId($user->id);
            return  redirect(route('index'));

        endif;
        alert()->error('کد وارد شده صحیح نمیباشد','متاسفیم');
        return redirect(route('login_token'));
    }
}
