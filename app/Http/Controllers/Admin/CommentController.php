<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment=Comment::query();
        if ($keyword=request('search')):
            $comments=$comment->latest()->where('comment','like',"%$keyword%")->orWhereHas('user',function ($query) use ($keyword){
                $query->where('name','like',"%$keyword%");
            });
        endif;
        $comments=$comment->latest()->orderBy('id')->where('approved',0)->paginate(10);
        return view('admin.comment.list',compact('comments'));
    }
    public function approved()
    {
        $comment=Comment::query();
        if ($keyword=request('search')):
            $comments=$comment->latest()->where('comment','like',"%$keyword%")->orWhereHas('user',function ($query) use ($keyword){
                $query->where('name','like',"%$keyword%");
            });
        endif;
        $comments=$comment->latest()->orderBy('id')->where('approved',1)->paginate(10);
        return view('admin.comment.approved',compact('comments'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'approved'=>1
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        alert()->success('دیدگاه با موفقیت حذف شد');
        return back();
    }
}
