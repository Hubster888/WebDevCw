@extends('layouts.list')
@extends('layouts.app')
    
@section('add_button')
    <a href="/home/posts/new">
        <button type="button" class="btn btn-success" id="button">Add post</button>
    </a>
@endsection

@section('title')
    <h1>All Posts</h1>
@endsection

@section('list')
    @foreach($posts as $post)
        <a href="/home/comments/{{$post->id}}">
            <x-post-view :title="$post->title" :content="$post->content" :author="$post->user->name"/>
        </a>
    @endforeach
@endsection




