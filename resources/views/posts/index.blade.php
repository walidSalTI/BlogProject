@extends('layout.app')
@section('title', 'index')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">user</th>
                <th scope="col">title</th>
                <th scope="col">category</th>
                <th scope="col">posted at</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post ) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('posts.edit', $post ) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy',$post) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;font-size:30px">there is no posts</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
