@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if ($posts->isEmpty())
        <p>There are no posts</p>
    @else
        @foreach ($posts as $post)
            <div class="card card-body bg-light mb-3">
                <h3>{{ $post->title }}</h3>
                <small>{{ $post->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    @endif
@endsection
