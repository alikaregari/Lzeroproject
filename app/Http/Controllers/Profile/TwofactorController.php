<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\Notifications\ActiveCodeNotification;
use Illuminate\Http\Request;

class TwofactorController extends Controller
{
    public function ShowProfile(){
        return view('user.profile');
    }
    public function TowFactor_Changer(Request $request)
    {
        $data = $this->ValidateRequestdata($request);
        if ($this->IsRequestType_Sms($data['tow_factor_type'])):
            if (auth()->user()->phone_number!== $data['phone_number']):
                return $this->CreateCodeAndSendSms($request, $data['phone_number']);
            else:
                $this->Set_Sms_To_TwoFactorType($request);
            endif;
        elseif ($this->IsRequestType_off($data['tow_factor_type'])):
            $this->Set_Off_To_TwoFactortype($request);
        endif;
        //
        return back();
    }
    public function show_CheckToken(Request $request){
        if (! $request->session()->has('phone_number')):
            return redirect(route('profile'));
        endif;
        $request->session()->reflash();
        return view('user.tokencheck');
    }
    public function CheckToken(Request $request){
        if (! $request->session()->has('phone_number')):
            return redirect(route('profile'));
        endif;
        $data=$request->validate([
            'token'=>'required',
        ]);
        $status=ActivationCode::VerifyCode($data['token'],$request->user());
        if ($status==true):
            $request->user()->ActivationCode()->delete();
            $request->user()->update([
                'phone_number'=>$request->session()->get('phone_number'),
                'tow_factor_type'=>'sms'
            ]);
            alert()->success('عملیات موفق بود','تبریک');
        else:
            alert()->error('کد وارد شده اشتباه است');
        endif;
        return redirect(route('profile'));
    }

    /**
     * @param Request $request
     * @return array
     */
    private function ValidateRequestdata(Request $request): array
    {
        $data = $request->validate([
            'phone_number' => 'required_unless:tow_factor_type,off',
            'tow_factor_type' => 'required|in:off,sms'
        ]);
        return $data;
    }

    /**
     * @param $tow_factor_type
     * @return bool
     */
    private function IsRequestType_Sms($tow_factor_type): bool
    {
        return $tow_factor_type === 'sms';
    }

    /**
     * @param Request $request
     * @param $phone_number
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function CreateCodeAndSendSms(Request $request, $phone_number)
    {
        $request->session()->flash('phone_number', $phone_number);
        $code = ActivationCode::GenerationCode();
        //TODO SEND SMS
        $request->user()->notify(new ActiveCodeNotification($code, $phone_number));
        return redirect(route('show_check_token'));
    }

    /**
     * @param Request $request
     */
    private function Set_Sms_To_TwoFactorType(Request $request): void
    {
        $request->user()->update([
            'tow_factor_type' => 'sms'
        ]);
        alert()->success('تغیرات با موفقیت ذخیره گردید', 'تبریک');
    }

    /**
     * @param $tow_factor_type
     * @return bool
     */
    private function IsRequestType_off($tow_factor_type): bool
    {
        return $tow_factor_type === 'off';
    }

    /**
     * @param Request $request
     */
    private function Set_Off_To_TwoFactortype(Request $request): void
    {
        $request->user()->update([
            'tow_factor_type' => 'off'
        ]);
        alert()->success('تغیرات با موفقیت ذخیره گردید', 'تبریک');
    }
}
