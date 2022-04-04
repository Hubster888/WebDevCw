@extends('layouts.app')
@section('post_list')

@foreach($posts as $post)
    <x-post-view :title="$post->title" :content="$post->content" :author="$post->user_id"/>
@endforeach

<x-post-view/>
<x-post-view/>
<x-post-view/>
<x-post-view/>
<x-post-view/>
<x-post-view/>
<x-post-view/>
@endsection
@section('comment_list')
<x-comment-view/>
<x-comment-view/>
<x-comment-view/>
<x-comment-view/>
<x-comment-view/>
<x-comment-view/>
<x-comment-view/>
@endsection
