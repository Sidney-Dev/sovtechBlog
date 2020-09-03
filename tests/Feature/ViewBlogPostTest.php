<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewBlogPostTest extends TestCase
{
    use DatabaseMigrations;
    
    /**
     * @group view-post
     */
    public function testCanViewABlogPost()
    {
        // arrangement
        // creating a blog post
        $post = Post::create([
            'title' => 'A simple title',
            'content' => 'A simple body',
        ]);


        // action 
        // visiting a route
        $response = $this->get("/post/$post->id");

        // assert
        // assert status code 200
        $response->assertStatus(200);
        // assert that we see a title
        $response->assertSee($post->title);
        // assert that we see a body
        $response->assertSee($post->content);
        // assert that we see published date
        // $response->assertSee($post->created_at->toFormattedDateString());
    }

    /**
     * @group post-not-found
     * @return [type] [description]
     */
    public function testViews404PageWhenPostNotFound()
    {
        // action
        $response = $this->get('/post/INVALID');

    
        // assert
        $response->assertStatus(404);
        $response->assertSee('The page you are looking for could not be');

    }
}
