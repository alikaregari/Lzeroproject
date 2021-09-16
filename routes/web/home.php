<?php

use App\Helpers\Login\Login;
use App\Http\Controllers\Auth\AuthTokenController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Profile\TwofactorController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->check()):
        $user=Auth::user()->name;
        return view('index',[compact('user')]);
        else:
            return view('index');
    endif;
})->name('index');
Route::prefix('/user/profile')->middleware(['auth','verified'])->group(function (){
    Route::get('/',[TwofactorController::class,'ShowProfile'])->name('profile');
    Route::post('/',[TwofactorController::class,'Towfactor_Changer'])->name('TowFactor_Changer');
    Route::get('/check_token',[TwofactorController::class,'show_CheckToken'])->name('show_check_token');
    Route::post('/check_token',[TwofactorController::class,'CheckToken'])->name('check_token');
});
Route::get('/contact',function (){ return 'Contact Page'; })->middleware(['password.confirm','verified']);
Route::prefix('auth')->group(function (){
    Route::get('google',[GoogleAuthController::class,'redirect'])->name('auth.google');
    Route::get('google/callback',[GoogleAuthController::class,'callback']);
    Route::get('token',[AuthTokenController::class,'Get_Token'])->name('login_token');
    Route::post('token',[AuthTokenController::class,'Post_Token'])->name('check_token_login');
});
Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('products/',[ProductController::class,'index'])->name('product_index');
Route::get('products/single/{product}',[ProductController::class,'show'])->name('product-single');
Route::post('comment',[HomeController::class,'send_comment'])->name('send.comment');
Route::post('cart/add/{product}',[CartController::class,'AddToCart'])->name('add.cart');
Route::get('cart',[CartController::class,'index'])->name('cart.index');
Route::patch('cart/quantity/change',[CartController::class,'quantityChange']);
