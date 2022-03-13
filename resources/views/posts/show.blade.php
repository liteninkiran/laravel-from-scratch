@extends('layouts.app')

@section('content')

    {{-- Back Button --}}
    <a role="button" class="btn btn-default mb-5" href="/posts">Go Back</a>

    {{-- Post Title --}}
    <h1>{{ $post->title }}</h1>

    {{-- Post Body --}}
    <div>
        {!! $post->body !!}
    </div>

    <hr>

    {{-- Created By / At --}}
    <div class="mb-5 mt-5">
        <small>Written by {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</small>
    </div>

    @auth

        @if(auth()->user()->id === $post->user_id)

            <hr>

            {{-- Edit Post --}}
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>

            {{-- Delete Post --}}
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'd-inline float-end']) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::hidden('_method', 'DELETE') }}
            {!! Form::close() !!}

        @endif

    @endauth

@endsection
