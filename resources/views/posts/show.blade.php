@extends('layouts.app')

@section('content')

    {{-- Back Button --}}
    <a role="button" class="btn btn-default mb-5" href="/posts">Go Back</a>

    {{-- Post Title --}}
    <h1>{{ $post->title }}</h1>

    <hr>

    {{-- Cover Image --}}
    @if ($post->cover_image)
        <img style="width: 100%;" src="/storage/cover_images/{{ $post->cover_image }}" class="mb-4">
    @endif

    {{-- Post Body --}}
    <div>
        {!! $post->body !!}
    </div>

    <hr>

    {{-- Created By / At --}}
    <div class="mb-5 mt-3">
        <small>Written by {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</small>
    </div>

    @auth

        @if(auth()->user()->id === $post->user_id)

            {{-- Edit Post --}}
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>

            {{-- Delete Post --}}
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'd-inline float-end']) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::hidden('_method', 'DELETE') }}
            {!! Form::close() !!}

            <div class="mb-5">

            </div>

        @endif

    @endauth

@endsection
