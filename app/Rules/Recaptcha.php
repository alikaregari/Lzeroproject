<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
            $res=Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
                'secret'=>env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                'response'=>$value,
                'remoteip'=>request()->ip()
            ]);
            $res->throw();
            $res=$res->json();
            return $res['success'];
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'شما به عنوان ربات تشخیص داده شده اید';
    }
}
