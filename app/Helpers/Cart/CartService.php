<?php

namespace app\Helpers\Cart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;

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
        elseif (!isset($value['id'])):
            $value = array_merge($value, [
                'id' => Str::random(10),
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
    public function all(){
        $cart=$this->cart;
        $cart=$cart->map(function ($value){
            return $this->findrel($value);
        });
        return $cart;
    }
    public function get($key){
            $item= $key instanceof Model ? $this->cart->where('subject_id',$key->id)->where('subject_type',get_class($key))->first() :
             $this->cart->firstWhere('id',$key);
            return $this->findrel($item);
    }
    public function findrel($item){
        if (isset($item['subject_type']) && isset($item['subject_id'])):
            $class=$item['subject_type'];
            $subject=(new $class())->find($item['subject_id']);
            $item[strtolower(class_basename($subject))]=$subject;
            return $item;
        endif;
        return $item;
    }
    public function update($product,$option){
        $item=collect($this->get($product));
        $new=$item->merge([
           'quantity'=>$item['quantity']+$option,
        ]);
        $this->put($new->toArray());
        return redirect('cart');
    }
    public function updateChecking($product,$option){
        $cart=Cart::get($product);
        if ($cart['quantity'] <= $product->inventory-1):
            Cart::update($product,$option);
        else:
            alert()->warning('موجودی درخواستی شما قابل پذیرش نمیباشد');
        endif;
    }
}

