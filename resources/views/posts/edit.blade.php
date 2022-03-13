@extends('layouts.app')

@section('content')

    {{-- Title --}}
    <h1>Update A Post</h1>

    {{-- Open Form --}}
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        {{-- Post Title --}}
        <div class="form-group mb-3">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        </div>

        {{-- Post Body --}}
        <div class="form-group mb-3">
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'id' => 'editor']) }}
        </div>

        {{-- Cover Image --}}
        <div class="form-group mb-4">
            {{ Form::file('cover_image') }}
        </div>

        {{-- Submit --}}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary mb-3']) }}
        {{ Form::hidden('_method', 'PUT') }}

    {{-- Close Form --}}
    {!! Form::close() !!}

@endsection
