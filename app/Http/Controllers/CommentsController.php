<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$comments = Comments::latest();
        return view('comments.index', ['comments' => $comments]);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $comment = Comment::create([
                'title' => $request->title,
                'body' => $request->body,
                'article_id' => $request->article_id,
                'user_id' => Auth::id()
            ]);

            if($comment) {
                return back()->withInput()->with('success', 'Comment created successfully');
            }
        }
        return back()->withInput()->with('error', 'You must be logged in');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $comment = Comment::find($comment->id);

        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $comment = Comment::find($comment->id);

        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $commentUpdate = Comment::where('id', $comment->id)->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if($commentUpdate) {
            return back()->withInput()->with('info', 'Comment updated successfully');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $findComment = Comment::find($comment->id);

        if($findComment->delete()) {
            return back()->withInput()->with('success', 'Comment deleted successfully');
        }
        return back()->withInput()->with('error', 'Comment could not be deleted');
    }
}
