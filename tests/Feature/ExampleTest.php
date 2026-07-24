<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_404_error_page_renders_custom_view(): void
    {
        $response = $this->get('/non-existent-page-route-xyz');
        $response->assertStatus(404);
        $response->assertSee('Page Not Found');
        $response->assertSee('Back to Home');
    }

    public function test_500_error_page_renders_custom_view(): void
    {
        $response = $this->get('/test-error/500');
        $response->assertStatus(500);
        $response->assertSee('Internal Server Error');
        $response->assertSee('Back to Home');
    }

    public function test_403_error_page_renders_custom_view(): void
    {
        $response = $this->get('/test-error/403');
        $response->assertStatus(403);
        $response->assertSee('Access Forbidden');
        $response->assertSee('Back to Home');
    }

    public function test_419_error_page_renders_custom_view(): void
    {
        $response = $this->get('/test-error/419');
        $response->assertStatus(419);
        $response->assertSee('Session Expired');
        $response->assertSee('Back to Home');
    }

    public function test_503_error_page_renders_custom_view(): void
    {
        $response = $this->get('/test-error/503');
        $response->assertStatus(503);
        $response->assertSee('Service Unavailable');
        $response->assertSee('Back to Home');
    }
}
