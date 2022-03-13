@extends('layouts.app')

@section('content')

    {{-- Title --}}
    <h1>Posts</h1>

    {{-- Posts? --}}
    @if ($posts->isEmpty())

        {{-- No Posts --}}
        <p>There are no posts</p>

    @else

        {{-- Posts! --}}
        @foreach ($posts as $post)

            {{-- Post --}}
            <div class="card card-body bg-light mb-3 d-flex">

                <div class="row">

                    {{-- Cover Image --}}
                    <div class="col-md-4 col-sm-4">
                        <img style="width: 100%;" src="/storage/cover_images/{{ $post->cover_image ?? 'no_image.jpg' }}" alt="">
                    </div>

                    {{-- Post Details --}}
                    <div class="col-md-8 col-sm-8">

                        {{-- Post Title --}}
                        <h3>
                            <a href="/posts/{{ $post->id }}" class="blog-post-link">
                                {{ $post->title }}
                            </a>
                        </h3>

                        {{-- Created By / At --}}
                        <small>
                            Written by {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}
                        </small>

                    </div>

                </div>

            </div>

        @endforeach

        {{-- Pagination Links --}}
        <div class="pagination-block">
            {{ $posts->links() }}
        </div>

    @endif

@endsection
