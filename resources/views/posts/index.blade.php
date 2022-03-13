@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if ($posts->isEmpty())
        <p>There are no posts</p>
    @else
        @foreach ($posts as $post)
            <div class="card card-body bg-light mb-3">
                <h3><a href="/posts/{{ $post->id }}" class="blog-post-link">{{ $post->title }}</a></h3>
                <small>Written by {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
        <div class="pagination-block">
            {{ $posts->links() }}
        </div>
    @endif
@endsection
