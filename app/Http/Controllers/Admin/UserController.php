<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AdminDashboardNotification;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show_users')->only(['index']);
        $this->middleware('can:user_edit')->only(['edit','update']);
        $this->middleware('can:user_create')->only(['create','store']);
        $this->middleware('can:user_delete')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::query();
        if ($key=request('search')):
            $users->where('email','LIKE',"%$key%")->orWhere('name','LIKE',"%$key%")->orWhere('id','=',"$key");
        endif;
        if (Gate::allows('show_staff_users')):
            if (request('admin')):
                $users->where('is_superuser','=',1)->orWhere('is_staff','=',1);
            endif;
        endif;
        $users=$users->orderBy('id','DESC')->paginate(10);
        return view('admin.user.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        //auth()->user()->notify(new AdminDashboardNotification());
        return view('admin.dashboard');
    }
    public function store(Request $request)
    {
       $data=$request->validate([
           'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);
       $user=User::create($data);
       if ($request->has('active')):
           $user->markEmailAsVerified();
       endif;
       alert()->success('کاربر جدید با موفقیت ایجاد شد','تبریک');
       return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        $data=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)]
        ]);
        if (! is_null($request->password)):
            $password=$request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
         $data['password']=$password['password'];
            endif;
            $user->update($data);
        if ($request->has('active')):
            $user->markEmailAsVerified();
        endif;
        alert()->success("کاربر $user->name  با موفقیت ویرایش شد",'تبریک');
        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('admin.user.index'));
    }
}
