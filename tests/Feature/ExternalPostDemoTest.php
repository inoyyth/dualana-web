<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ExternalPostDemoTest extends TestCase
{
    public function test_the_posts_demo_page_loads_and_displays_posts(): void
    {
        // Mock the JSONPlaceholder external API response
        Http::fake([
            'https://jsonplaceholder.typicode.com/posts*' => Http::response([
                [
                    'userId' => 1,
                    'id' => 1,
                    'title' => 'Mocked Post Title One',
                    'body' => 'Mocked post body content one.'
                ],
                [
                    'userId' => 1,
                    'id' => 2,
                    'title' => 'Mocked Post Title Two',
                    'body' => 'Mocked post body content two.'
                ]
            ], 200)
        ]);

        $response = $this->get('/posts-demo');

        $response->assertStatus(200);
        $response->assertSee('REST API Client Demo');
        $response->assertSee('Mocked Post Title One');
        $response->assertSee('Mocked Post Title Two');
        $response->assertSee('ID: 1');
        $response->assertSee('ID: 2');
    }

    public function test_the_post_detail_page_loads_and_displays_post(): void
    {
        // Mock the specific post endpoint response
        Http::fake([
            'https://jsonplaceholder.typicode.com/posts/42' => Http::response([
                'userId' => 3,
                'id' => 42,
                'title' => 'Mocked Post 42 Title',
                'body' => 'Detailed body content for post 42.'
            ], 200)
        ]);

        $response = $this->get('/posts-demo/42');

        $response->assertStatus(200);
        $response->assertSee('Mocked Post 42 Title');
        $response->assertSee('Detailed body content for post 42.');
        $response->assertSee('Post ID: 42');
        $response->assertSee('Author User: 3');
    }

    public function test_the_posts_demo_page_passes_query_parameters_to_api(): void
    {
        Http::fake([
            'https://jsonplaceholder.typicode.com/posts*' => Http::response([], 200)
        ]);

        $response = $this->get('/posts-demo?userId=5&_limit=3');

        $response->assertStatus(200);

        Http::assertSent(function ($request) {
            return $request->url() === 'https://jsonplaceholder.typicode.com/posts?_limit=3&userId=5' &&
                $request->method() === 'GET';
        });
    }
}
