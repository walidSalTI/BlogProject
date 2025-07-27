@extends('layout.app')
@section('title', 'show')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card" style="width: 18rem;">
        <div id="user_info" style="display: flex;gap: 20px;align-items:center">
                <div class="image"><img src="/images/{{ $user->image }}" alt="dd"></div>
                <h5>{{ $user->name }}</h5>
        </div>  
        @if ($post->category!=null)
        <div class="category  " style="height:25px;display:flex;justify-content:flex-end"><p class="badge text-bg-secondary" style="height: 100%">{{ $post->category }}</p></div>
        @endif
        @if($post->image!=null)
        <img src="../images/posts/{{ $post->image }}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{$post->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
        @forelse ($tags as $tag )
            <li class="list-group-item">{{ $tag->content }}</li>
            
        @empty
            <li class="list-group-item">no tags</li>
        @endforelse
        </ul>
    </div>
    </div>
@endsection
