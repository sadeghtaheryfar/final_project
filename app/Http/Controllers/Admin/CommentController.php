<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $unseenComments = Comment::where('status', 'unseen')->get();
        foreach ($unseenComments as $unseenComment) {
            $unseenComment->status = 1;
            $unseenComment->save();
        }
        $comments = Comment::all();
        return view('admin.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }


    public function change(Comment $comment)
    {

        $comment->status == 1 ? $comment->status = 2 : $comment->status = 1;
        $comment->save();
        return redirect()->route('admin.comment.index')->with('swal-success', ' تغییر شما با موفقیت ثبت شد');
    }
}
