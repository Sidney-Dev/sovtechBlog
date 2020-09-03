<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    public function show($id){

        try {
            $post = Post::findOrFail($id);

        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Page not found');
        }

        return view('post')->withPost($post);
    }

    public function showAll()
    {
        $posts = Post::all();


        return view('posts.index', compact('posts'));
    }
}
