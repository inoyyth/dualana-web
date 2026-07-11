<?php

namespace Tests\Feature;

use Tests\TestCase;

class ArchitectureDemoTest extends TestCase
{
    public function test_the_architecture_demo_page_is_available(): void
    {
        $response = $this->get('/architecture-demo');

        $response->assertStatus(200);
        $response->assertSee('Layered Architecture');
        $response->assertSee('Presentation Layer');
    }
}
