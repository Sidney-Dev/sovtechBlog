<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show all posts
     */
    public function index() {

        return Post::all();
    }

    /**
     * API method to save post
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
        return $post;
    }

    /**
     * API method to show all posts
     */
    public function showAll()
    {
        $posts = Post::all();

        if($posts === NULL)
        {
            return view('posts');

        } else {
            return view('posts', compact('posts'));
        }
        
    }


    /**
     * End point to delete a single post
     */
    public function destroy(Post $post) {
        $post->delete();

        return 'task deleted';
    }


    /***********   UPDATE FORM     ************/
    /******************************************/
    public function edit($id){
        $post = Post::findOrFail($id)->first();
        return view('posts.edit', compact('post'));
    }

        /***********   UPDATE METHOD     ************/
    /******************************************/
    public function update(Request $request, $id)
    {
        $post = [
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ];

        Auth::user()->posts()->whereId($id)->first()->update($post);
        return redirect('/admin/posts');
    }
}
