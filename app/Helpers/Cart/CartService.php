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
        $value = $this->Put_Get_Value($obj, $value);
        $this->cart->put($value['id'],$value);
        session()->put('cart',$this->cart);
        return $this;
    }

    /**
     * @param $obj
     * @param array $value
     * @return array|bool[]|string[]
     */
    /*  -START- get value and merge by uor value and return it ---------> */
    private function Put_Get_Value($obj, array $value): array
    {
        if (isset($obj) && $obj instanceof Model):
            $value = array_merge($value, [
                'id' => Str::random(10),
                'subject_id' => $obj->id,
                'subject_type' => get_class($obj),
            ]);
        else:
            $value = array_merge($value, [
                'id' => Str::random(10),
                'model' => false
            ]);
        endif;
        return $value;
    }
    /*  -END-   get value and merge by uor value and return it ---------> */
    public function has($key){
        if ($key instanceof Model):
            return !is_null(
                $this->cart->where('subject_id',$key->id)->where('subject_type',get_class($key))->first()
            );
        endif;
        return !is_null(
          $this->cart->firstWhere('id',$key)
        );

    }
}

