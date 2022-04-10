@extends('layouts.list')
@extends('layouts.app')
    
@section('add_button') <!--Display add and delete post buttons-->
    <a href="/home/posts/new">
        <button type="button" class="btn btn-success" id="button">Add post</button>
    </a>
    @if ($comments)
        <button type="button" class="btn btn-secondary" onClick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete post</button>
        <form id="delete-form" method="post" action="/home/posts/{{$id}}">
            @csrf 
            @method('DELETE')
        </form>
    @endif
@endsection

@section('title')
    <h1>All Posts</h1>
@endsection

@section('post_list') <!--Display list of all posts-->
    @foreach($posts as $post)
        <a href="/home/posts/{{$post->id}}/show">
            @if($post->id == $id)
                <div id="post_container" style="background-color:white;">
                    <x-post-view :title="$post->title" :content="$post->content" :author="$post->user->name"/>
                </div>
            @else
                <div id="post_container" style="background-color:gray;">
                    <x-post-view :title="$post->title" :content="$post->content" :author="$post->user->name"/>
                </div>
            @endif
        </a>

        <a href="/home/posts/{{$post->id}}" method="edit">
            <button type="button" class="btn btn-success" id="button">Edit post</button> 
        </a>

        <a  href="/home/comments/{{$post->id}}/new"> 
            <button type="button" class="btn btn-success" id="button">Add comment</button>
        </a>
    @endforeach
@endsection 

@section('comment_list') <!--Display list of all for the selected post-->
    @if($comments)
        @foreach($comments as $comment)
            <x-comment-view :title="$comment->title" :content="$comment->content" :author="$comment->user->name"/>
            <a href="/home/comments/{{$id}}/{{$comment->id}}" method="edit">
                <button type="button" class="btn btn-success" id="button">Edit</button> 
            </a>
            <a href="/home/comments/{{$id}}/{{$comment->id}}/delete" method="show_delete">
                <button type="button" class="btn btn-success" id="button">Delete</button>
            </a>
            <form id="delete-form-comment" method="post" action="/home/comments/{{$id}}/{{$comment->id}}">
                @csrf 
                @method('DELETE')
            </form>
        @endforeach
    @endif
@endsection




