<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $call;
    public function __construct()
    {
        $this->call=collect([]);
    }
    public function index(){
    /*    $this->call->put(1,[
            'quantity'=>2,
            'price'=>25000,
            'product'=>[
                'name'=>'مرحله اول',
                'id'=>12
            ]
        ]);
        $this->call->put(2,[
            'quantity'=>3,
            'price'=>35000,
            'product'=>[
                'name'=>'مرحله اول',
                'id'=>13
            ]
        ]);
        $item=collect($this->call->get(1));
        $item=$item->merge([
            'quantity'=>7
        ]);
        $this->call->put(1,$item);
        return $this->call;*/
        $cart=Cart::all();
        return view('products.cart',compact('cart'));
    }
    public function AddToCart(Product $product)
    {
        if (Cart::has($product)):
             Cart::updateChecking($product,1);
            else:
             Cart::put(['quantity'=>1,'price'=>$product->price],$product);
        endif;
        return redirect('cart');
    }
    public function quantityChange(Request $request){
        $data=$request->validate([
            'quantity'=>'required',
            'id'=>'required',
            'btn'=>'required'
            //'cart'=>'required'
        ]);
        if ($data['btn']==true):
            $data['quantity']=$data['quantity']+1;
        endif;
        unset($data['btn']);
        if (Cart::has($data['id'])):
            Cart::update($data['id'],[
                'quantity'=>$data['quantity']
            ]);
            return response(['status'=>'success']);
            else:
            return response(['status'=>'error',404]);
            endif;
    }
}
