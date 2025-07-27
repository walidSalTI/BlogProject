@extends('layout.app')

@section('title', 'Edit Post')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Post</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto border p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{  $post->title}}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
            <textarea name="description" id="description" rows="4" class="form-control" required>{{ $post->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (optional)</label>
            <input type="file" name="image" id="image" class="form-control">

            @if ($post->image)
                <div class="mt-3">
                    <p>Current Image:</p>
                    <img src='/images/posts/{{ $post->image }}'alt="Post Image" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category (optional)</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $post->category }}">
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags (comma-separated, optional)</label>
            <input type="text" name="tags" id="tags" class="form-control" 
                value="{{  $post->tags->pluck('content')->implode(', ') }}">
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Post</button>
    </form>
</div>
@endsection
