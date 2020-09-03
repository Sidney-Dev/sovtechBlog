@extends('layouts.app')
@section('content')

<div class="container">
    <h1>New Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <input type="text" name="title" value="{{ $post->title }}" class="form-control">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="content" cols="30" rows="10">{{ $post->content }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>
@stop