@extends('layout.app')
@section('title', 'edit comment')
@section('content')
    <form action="{{ route('comments.update',$comment) }}" method="POST"> 
        @csrf
        @method("PUT")
        <textarea name="comment" class="form-control" rows="2" placeholder="update a comment..." style="resize: none;" required>{{ $comment->content }}</textarea>
        <input type="submit" value="update" class="btn btn-primary">
    </form>

@endsection
