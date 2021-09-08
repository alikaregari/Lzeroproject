<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Product $product): Product
    {
        return $product;
    }
}
