@extends('website.layouts.app')

@section('content')
    @include('website.layouts.partials.main_header')
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('website.posts.show', $post->id) }}">
                            <h2 class="post-title">{{$post->id}} - {{ $post->title }}</h2>
                            <h3 class="post-subtitle">{{ $post->sub_title }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="{{ route('website.posts.show', $post->id) }}">{{ $post->user->name }}</a>
                            on {{ $post->published_at->format('F d, Y') }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-between mb-4">
                    <a class="btn btn-primary text-uppercase" href="{{ $posts->previousPageUrl() }}">Newest Posts</a>
                    <a class="btn btn-primary text-uppercase" href="{{ $posts->nextPageUrl() }}">Older Posts</a>
                </div>
            </div>
        </div>
    </div>
@endsection
