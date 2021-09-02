<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class UserPermissionsController extends Controller
{
    public function create(User $user){
        return view('admin.user.permission',compact('user'));
    }
    public function store(Request $request,User $user){
        $user->permissions()->sync($request->permissions);
        $user->rules()->sync($request->rules);
        return redirect(route('admin.user.index'));
    }
}
