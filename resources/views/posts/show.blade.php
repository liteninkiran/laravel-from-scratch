@extends('layouts.app')

@section('content')
    <a role="button" class="btn btn-default" href="/posts">Go Back</a>
    <h1>{{ $post->title }}</h1>
    <div>
        {!! $post->body !!}
    </div>
    <hr>
    <small>{{ $post->created_at->diffForHumans() }}</small>
@endsection
