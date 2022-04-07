@extends('layouts.list')
@extends('layouts.app')
    <!-- CHANGE THE LINKS AND BUTTONS -->
@section('add_button')
    <a href="/home/posts/{{$post_id}}" method="edit">
        <button type="button" class="btn btn-success" id="button">Edit post</button> 
    </a>
    
    <button type="button" class="btn btn-secondary" onClick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete post</button>
    
    <form id="delete-form" method="post" action="/home/posts/{{$post_id}}">
        @csrf 
        @method('DELETE')
    </form>

    <a  href="/comments/{{$post_id}}/new"> 
        <button type="button" class="btn btn-success" id="button">Add comment</button>
    </a>
@endsection

@section('title')
    <h1>Post's Commetns</h1>
@endsection

@section('list')
    @foreach($comments as $comments)
        <a href="/home/posts">
            <x-comment-view :title="$comments->title" :content="$comments->content" :author="$comments->user->name"/>
        </a>
    @endforeach
@endsection