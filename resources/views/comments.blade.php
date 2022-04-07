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

    <a  href="/home/comments/{{$post_id}}/new"> 
        <button type="button" class="btn btn-success" id="button">Add comment</button>
    </a>
@endsection

@section('title')
    <h1>Post's Commetns</h1>
@endsection

@section('list')
    @foreach($comments as $comments)
        <x-comment-view :title="$comments->title" :content="$comments->content" :author="$comments->user->name"/>
        <div class="row">
            <div col="col-lg-6">
                <a href="/home/comments/{{$post_id}}/{{$comments->id}}" method="edit">
                    <button type="button" class="btn btn-success" id="button">Edit comment</button> 
                </a>
            </div>
            <div col="col-lg-6">
                <button type="button" class="btn btn-secondary" onClick="event.preventDefault(); document.getElementById('delete-form-comment').submit();">Delete comment</button> 
                <form id="delete-form-comment" method="post" action="/home/comments/{{$post_id}}/{{$comments->id}}">
                    @csrf 
                    @method('DELETE')
                </form>
            </div>
        </div>
        
    @endforeach
@endsection