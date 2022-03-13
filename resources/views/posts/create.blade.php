@extends('layouts.app')

@section('content')

    {{-- Title --}}
    <h1>Create A Post</h1>

    {{-- Open Form --}}
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}

    {{-- Post Title --}}
    <div class="form-group mb-3">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>

    {{-- Post Body --}}
    <div class="form-group mb-3">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['class' => 'form-control', 'id' => 'editor']) }}
    </div>

    {{-- Submit --}}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary mb-3']) }}

    {{-- Close Form --}}
    {!! Form::close() !!}

@endsection
