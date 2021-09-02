<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::latest()->paginate(12);
        return view('products.list',compact('products'));
    }
    public function show(Product $product){
       $comments=$product->commentzero($product);
        return view('products.single',compact('product','comments'));
    }
}
