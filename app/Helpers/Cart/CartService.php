<?php

namespace app\Helpers\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CartService
{
    protected $cart;
    public function __construct()
    {
        $this->cart=session()->get('cart') ?? collect([]);
    }

    public function put(array $value,$obj = null){
        if (isset($obj) && $obj instanceof Model):
            $value=array_merge($value,[
                    'id'=>Str::random(10),
                    'subject_id'=>$obj->id,
                    'subject_type'=> get_class($obj),
                ]);
        else:
            $value=array_merge($value,[
                'id'=> Str::random(10),
                'model'=>false
            ]);
        endif;
        $this->cart->put($value['id'],$value);
        session()->put('cart',$this->cart);
        return $this;
    }
}
