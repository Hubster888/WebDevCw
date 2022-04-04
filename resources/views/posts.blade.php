@extends('layouts.app')
@section('page_name')
    <h1>All Posts</h1>
@endsection
@section('post_list')
    @foreach($posts as $post)
        <x-post-view :title="$post->title" :content="$post->content" :author="$post->user->name"/>
    @endforeach
@endsection
@section('comment_list')
    @foreach($posts as $post)
        @if($post->id == 3)
            @foreach($post->comments as $comment)
                <x-comment-view :title="$comment->title" :content="$comment->content" :author="$comment->user->name"/>
            @endforeach
        @endif
    @endforeach
@endsection

