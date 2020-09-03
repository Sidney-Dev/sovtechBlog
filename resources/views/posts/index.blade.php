@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($posts as $post)

            <div class="mb-4">
                <h3 class="post-title">{{ $post->title }}</h3>
                <div class="post-content">{{ $post->content }}</div>
                <a href="{{ route('post.show', $post->id) }}">Read more</a>
            </div>

        @endforeach
    </div>

@endsection