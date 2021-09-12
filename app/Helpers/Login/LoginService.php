<?php

namespace app\Helpers\Login;
use Illuminate\Support\Str;

class LoginService
{
   protected $cart;
   public function __construct()
   {
       $this->cart=session()->get('cart') ?? collect([]);
   }
   public function put($value,$obj){
       $value=array_merge($value,[
           'id'=>Str::random(10),
           'subject_id'=>$obj->id,
           'subject_type'=>get_class($obj)
       ]);
       $this->cart->put($value['id'],$value);
       session()->put('cart',$this->cart);
   }
   public function has($obj){
       return $this->cart->where('subject_id',$obj->id)->where('subject_type',get_class($obj))->first();
   }
}
