@extends('layouts.app')
@section('content')
    <button type="button" class="btn btn-secondary" onClick="event.preventDefault(); document.getElementById('delete-form-comment').submit();">Delete</button>
    <form id="delete-form-comment" method="post" action="/home/comments/{{$post_id}}/{{$comment_id}}">
        @csrf 
        @method('DELETE')
    </form>
@endsection