@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Post Admin</h1>

    <!-- Add a new post -->
    <form class="addPost my-4">
        <div class="form-group">
            <input class="form-control m-auto" type="text" name="title" placeholder="Add title"/>
        </div>
        <div class="form-group">
            <textarea name="content" cols="30" rows="5" class="form-control" placeholder="Add content"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>

    <!-- Show all posts in a table if there are any posts  -->
    @if($posts)

        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
            </tr>
        </thead>
        <tbody class="postRows">
            @foreach($posts as $post)

                <tr data-target="{{ $post->id }}">
                    <th scope="row">{{ $post->id }}</th>
                    <th>{{ $post->title }}</th>
                    <th>{{ $post->content }}</th>
                    <th><a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a></th>
                    <th><button class="btn btn-danger delete">Delete</button></th>
                </tr>
            @endforeach

        </tbody>
        </table>

    @endif

</div>

@endsection