@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    {{-- Page Heaading --}}
                    <div class="card-header">
                        {{ __('Dashboard') }}
                    </div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- Create Post --}}
                        <a href="/posts/create" class="btn btn-primary mb-4">Create Post</a>

                        {{-- Title --}}
                        <h3>Your Posts</h3>

                        @if ($posts->isEmpty())
                            <p>You have not created any posts</p>
                        @else

                            <table class="table tabled-striped">
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                @foreach ($posts as $post)
                                    <tr>
                                        {{-- Post Title --}}
                                        <td>{{ $post->title }}</td>

                                        {{-- Edit Post --}}
                                        <td>
                                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">
                                                EDIT
                                            </a>
                                        </td>

                                        {{-- Delete Post --}}
                                        <td>
                                            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'd-inline float-end']) !!}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                                @endforeach

                            </table>

                            <div class="pagination-block">
                                {{ $posts->links() }}
                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
