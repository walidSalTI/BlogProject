<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment'=> 'string|required|max:1000',
        ]); 
        Comment::create([
            'content'=> $request->comment,
            'user_id' => auth()->user()->id,
            'post_id'=> $post->id,
        ]);

        return redirect()->route('posts.show',$post);
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
        return view('comments.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $post = $comment->post;
        $request->validate([
            'comment'=> 'string|required|max:1000',
        ]); 
        $comment->content = $request->comment;
        $comment->update();
        return redirect()->route('posts.show',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $psot = $comment->post;
        $comment->delete();
        return redirect()->back();
    }
}
