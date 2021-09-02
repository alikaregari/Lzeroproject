<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function  send_comment(Request $request){
        $data=$request->validate([
            'comment'=>['required','string'],
            'commentable_id'=>['required','integer'],
            'commentable_type'=>['required'],
            'parent_id'=>['required','integer']
        ]);
        auth()->user()->comments()->create($data);
        alert()->success('نظر شما با موفقیت ارسال گردید','با تشکر');
        return back();
}
}
