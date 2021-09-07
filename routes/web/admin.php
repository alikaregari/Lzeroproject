<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\UserPermissionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
Route::get('/',[UserController::class,'dashboard'])->name('dashboard');
Route::resource('user', UserController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('rules', RuleController::class);
Route::get('/users/{user}/add_permissions',[UserPermissionsController::class,'create'])->name('user.permissions.get')->middleware('can:staff_user_permissions');
Route::post('/users/{user}/add_permissions',[UserPermissionsController::class,'store'])->name('user.permissions.post')->middleware('can:staff_user_permissions');
Route::resource('products', ProductController::class);
Route::resource('comments', CommentController::class)->only(['index','update','destroy']);
Route::get('comments/approved',[CommentController::class,'approved']);
Route::resource('categories', CategoryController::class);
Route::post('attribute/values',[ProductController::class,'ProductValues']);
