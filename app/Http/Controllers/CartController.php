<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Product $product)
    {
        Cart::put([
            'quantity'=>1,
            'price'=>$product->price
        ],$product);
        return session()->get('cart');
    }
}
