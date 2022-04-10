<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id)
    {
        // Get all posts
        $posts = Post::all();

        if ($post_id < 0) { // Check if a post is selected
            $comments = Null;
            return view('posts', ['posts'=>$posts, 'comments'=>$comments]);
        }

        $comments = Comment::where("post_id", $post_id)->get();
        
        return view('posts', ['posts'=>$posts, 'comments'=>$comments, 'id'=>$post_id]);
        
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate post input
        $request->validate([
            'content' => 'required|max:500',
            'title' => 'required|max:25'
        ]);

        $post = Auth::user()->posts()->create($request->only(['title', 'content'])); // Create a post for the user

        if ($post) {
            return redirect('/home/posts/0/show'); // Go to the main page
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
    public function edit($id)
    {
        //
        $post = Post::where("id", $id)->get()->first();
        return view('edit_post', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::where("id", $id)->get()->first();
        if($post->user_id != Auth::id()) { // Check for appropriate authentication
            return abort(403);
        }

        // Validate input
        $request->validate([
            'content' => 'required|max:500',
            'title' => 'required|max:25'
        ]);

        $post->update($request->only(['title', 'content']));

        return redirect()->to('/home/posts/0/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where("id", $id)->get()->first();
        if($post->user_id != Auth::id()) { // Check for appropriate authentication
            return abort(403);
        }
        $post->delete();
        return redirect()->to('/home/posts/0/show'); 
    }
}
