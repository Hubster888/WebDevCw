<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class CommentController extends Controller 
{

    public function apiIndex()
    {
        $comments = Comment::all();
        return $comments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        //
        //$comments = Comment::all();
        $comments = Comment::where("post_id", $post_id)->get();
        return view('comments', ['comments'=>$comments, 'post_id'=>$post_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        //
        return view('addComment', ['post_id'=>$post_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $request->validate([
            'content' => 'required|max:500',
            'title' => 'required|max:25'
        ]);

        $comment = Auth::user()->comments()->create($request->only(['title', 'content', 'post_id']));
        $id = $request->post_id;

        if ($comment) {
            return redirect()->to('/home/comments/'.$id);
        }

        return redirect()->back();
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
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id, $comment_id)
    {
        //
        $post = Post::where("id", $post_id)->get()->first();
        $comment = $post->comments()->where("id", $comment_id)->get()->first();
        return view('edit_comment', ['comment'=>$comment, 'post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id, $comment_id)
    {
        //
        $post = Post::where("id", $post_id)->get()->first();
        $comment = $post->comments()->where("id", $comment_id)->get()->first();
        if($comment->user_id != Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'content' => 'required|max:500',
            'title' => 'required|max:25'
        ]);

        $comment->update($request->only(['title', 'content']));

        return redirect()->to('/home/comments/'.$post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $comment_id)
    {
        //
        $post = Post::where("id", $post_id)->get()->first();
        $comment = $post->comments()->where("id", $comment_id)->get()->first();
        if($comment->user_id != Auth::id()) {
            return abort(403);
        }
        $comment->delete();
        return redirect()->to('/home/comments/'.$post_id);
    }
}
