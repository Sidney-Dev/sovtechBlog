<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewAllBlogPostsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group posts
     */

    public function testCanViewAllBlogPosts() {

        $post1 = Post::create([
            'title' => 'A simple title',
            'content' => 'A simple body',
        ]);

        $post2 = Post::create([
            'title' => 'A simple title',
            'content' => 'A simple body',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee($post1->title);
        $response->assertSee($post2->title);
        $response->assertSee($post1->content);
        $response->assertSee($post2->content);


    }
}
