@extends('layout.app')

@section('title', 'Create Post')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Create New Post</h3>
                </div>
                <div class="card-body">

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                        </div>

                        {{-- Image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Image (Optional)</label>
                            <input type="file" name="image" id="image" class="form-control" >
                        </div>

                        {{-- Category --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">Category (Optional)</label>
                            <input type="text" name="category" id="category" class="form-control">
                        </div>

                        {{-- Tags --}}
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags (Optional, comma-separated)</label>
                            <input type="text" name="tags" id="tags" class="form-control" placeholder="e.g. php, laravel, backend">
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Create Post</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
