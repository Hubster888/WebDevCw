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
        $post = Post::where("id", $id)->get()->first();
        $email = $post->user()->get()->first()->email;

        if ($comment) {
            // the message
            $msg = "Your post got a comment!";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // send email
            mail("rzeminski16@gmail.com","Alert",$msg);
            
            return redirect()->to('/home/posts/'.$id.'/show');
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

        return redirect()->to('/home/posts/'.$post_id.'/show');
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
        return redirect()->to('/home/posts/'.$post_id.'/show');
    }

    public function show_delete($post_id, $comment_id){
        return view('delete_comment', ['post_id'=>$post_id, 'comment_id'=>$comment_id]);
    }
}
