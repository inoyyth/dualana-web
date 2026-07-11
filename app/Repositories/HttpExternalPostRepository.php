<?php

namespace App\Repositories;

use App\Infrastructure\Http\RestClientInterface;
use App\Repositories\Contracts\ExternalPostRepositoryInterface;

class HttpExternalPostRepository implements ExternalPostRepositoryInterface
{
    protected string $baseUrl;

    public function __construct(
        private readonly RestClientInterface $client
    ) {
        $this->baseUrl = config('app.base_api_url');
    }

    public function getPosts(array $query = []): array
    {
        $response = $this->client
            ->withBaseUrl($this->baseUrl)
            ->get('/posts', array_merge(['_limit' => 9], $query));

        return $response->json();
    }

    public function getPostById(int $id): array
    {
        $response = $this->client
            ->withBaseUrl($this->baseUrl)
            ->get("/posts/{$id}");

        return $response->json();
    }
}
