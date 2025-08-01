@extends('layout.app')
@section('title', 'show')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <!-- Post Card -->
                <div class="card shadow-sm mb-4">
                    <!-- Card Header -->
                    <div class="card-header bg-white py-3 d-flex align-items-center">
                        <!-- User Image -->
                        <img src="/images/{{ $user->image }}" alt="no image" class="rounded-circle me-3" width="50"
                            height="50">

                        <!-- User Info -->
                        <div class="d-flex flex-column">
                            <a href="{{ route('profile.index') }}" class="text-dark fw-bold text-decoration-none">
                                {{ $user->name }}
                            </a>
                            <div class="text-muted small">
                                {{ $post->created_at->diffForHumans() }} ·
                                <span class="badge bg-primary">
                                    {{ $post->category }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Post Title -->
                        <h5 class="card-title fw-bold mb-3">{{ $post->title }}</h5>

                        <!-- Post Description -->
                        <p class="card-text mb-3">
                            {{ $post->description }}
                        </p>

                        <!-- Post Image -->
                        @if ($post->image)
                            <div class="mb-3">
                                <img src="/images/posts/{{ $post->image }}" alt="Post image" class="img-fluid rounded">
                            </div>
                        @endif

                        <!-- Tags -->
                        <div class="mb-3">
                            @forelse ( $post->tags as $tag )
                                <a href="#" class="badge bg-secondary text-decoration-none me-1">
                                    #{{ $tag->content }}
                                </a>
                            @empty
                                
                            @endforelse 
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer bg-white border-top-0">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="far fa-thumbs-up me-1"></i> Like
                            </button>
                            <!-- Comment Button -->
                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse"
                                data-bs-target="#commentForm">
                                <i class="far fa-comment me-1"></i> Comment
                            </button>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-share me-1"></i> Share
                            </button>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="card-footer bg-white pt-3">
                        <!-- Comment Form (Collapsible) -->
                        <div class="collapse mb-4" id="commentForm">
                            <form action="{{ route('comments.store', $post) }}" method="POST">
                                @csrf
                                <div class="d-flex align-items-start">
                                    <img src="/images/{{ $user->image}}" alt="user image"
                                        class="rounded-circle me-2" width="36" height="36">

                                    <div class="flex-grow-1">
                                        <textarea name="comment" class="form-control" rows="2" placeholder="Write a comment..." style="resize: none;" required></textarea>
                                        <input type="submit" class="btn btn-primary btn-sm mt-2" value="Post Comment">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Existing Comments -->
                        @if($comments)
                        <div class="mt-3">
                            @foreach ($comments as $comment)
                                <div class="d-flex mb-3">
                                    <img src="/images/{{ $comment->user->image }}" alt="user image"
                                        class="rounded-circle me-2" width="36" height="36">

                                    <div class="flex-grow-1">
                                        <div class="bg-light rounded-3 p-3">
                                            <a href="#" class="text-dark fw-bold text-decoration-none">
                                                {{ $comment->user->name }}
                                            </a>
                                            <p class="mb-0">{{ $comment->content }}</p>
                                        </div>
                                        <div class="small text-muted mt-1">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </div>
                                        <div class="actions d-flex justify-content-between">
                                        <form action="{{ route('comments.destroy',$comment) }}" method="POST">
                                            @csrf       
                                            @method('delete')
                                            <input type="submit" class="btn  btn-danger" value="delete">
                                        </form>
                                            <a href="{{ route('comments.edit',$comment)}}" class="btn btn-success">edit</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            border-bottom: 1px solid #e0e0e0;
        }

        .card-footer {
            border-top: 1px solid #e0e0e0;
        }

        .badge {
            font-weight: 500;
            padding: 5px 10px;
        }

        .btn-outline-secondary {
            color: #65676b;
        }

        .btn-outline-secondary:hover {
            background-color: #f0f2f5;
        }
    </style>
@endsection
