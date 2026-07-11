<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('demo:rest', function (App\Infrastructure\Http\RestClientInterface $restClient) {
    $this->info("=== Starting REST Client Demo with JSONPlaceholder API ===");

    // We build a clone configured with the base URL
    $client = $restClient->withBaseUrl('https://jsonplaceholder.typicode.com');

    // 1. GET Request
    $this->comment("\n1. Performing GET /posts/1...");
    $getResponse = $client->get('/posts/1');
    if ($getResponse->successful()) {
        $this->info("GET Success (Status: " . $getResponse->status() . ")");
        $this->line(json_encode($getResponse->json(), JSON_PRETTY_PRINT));
    } else {
        $this->error("GET Failed: " . $getResponse->body());
    }

    // 2. POST Request
    $this->comment("\n2. Performing POST /posts...");
    $postPayload = [
        'title' => 'Antigravity REST Demo',
        'body' => 'This is a test post from the REST client library.',
        'userId' => 42
    ];
    $postResponse = $client->post('/posts', $postPayload);
    if ($postResponse->successful()) {
        $this->info("POST Success (Status: " . $postResponse->status() . ")");
        $this->line(json_encode($postResponse->json(), JSON_PRETTY_PRINT));
    } else {
        $this->error("POST Failed: " . $postResponse->body());
    }

    // 3. PUT Request
    $this->comment("\n3. Performing PUT /posts/1...");
    $putPayload = [
        'id' => 1,
        'title' => 'Updated Title via REST Client',
        'body' => 'Updated body text.',
        'userId' => 1
    ];
    $putResponse = $client->put('/posts/1', $putPayload);
    if ($putResponse->successful()) {
        $this->info("PUT Success (Status: " . $putResponse->status() . ")");
        $this->line(json_encode($putResponse->json(), JSON_PRETTY_PRINT));
    } else {
        $this->error("PUT Failed: " . $putResponse->body());
    }

    // 4. DELETE Request
    $this->comment("\n4. Performing DELETE /posts/1...");
    $deleteResponse = $client->delete('/posts/1');
    if ($deleteResponse->successful()) {
        $this->info("DELETE Success (Status: " . $deleteResponse->status() . ")");
        // jsonplaceholder delete returns empty array
        $this->line(json_encode($deleteResponse->json(), JSON_PRETTY_PRINT));
    } else {
        $this->error("DELETE Failed: " . $deleteResponse->body());
    }

    $this->info("\n=== REST Client Demo Completed ===");
})->purpose('Demonstrate the custom REST client library with JSONPlaceholder');
