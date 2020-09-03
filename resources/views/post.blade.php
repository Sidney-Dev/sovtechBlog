@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="single-post-title">{{ $post->title }}</h1>
        <div class="single-post-content">{{ $post->content }}</div>

    </div>

@endsection