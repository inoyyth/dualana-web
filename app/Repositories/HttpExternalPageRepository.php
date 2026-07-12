<?php

namespace App\Repositories;

use App\Infrastructure\Http\RestClientInterface;
use App\Repositories\Contracts\ExternalPageRepositoryInterface;

class HttpExternalPageRepository implements ExternalPageRepositoryInterface
{
    protected string $baseUrl;

    public function __construct(
        private readonly RestClientInterface $client
    ) {
        $this->baseUrl = config('app.base_api_url');
    }

    public function getPage(array $query = []): array
    {
        $response = $this->client
            ->withBaseUrl($this->baseUrl)
            ->get('/pages', array_merge(['_limit' => 9], $query));

        return $response->json();
    }

    public function getPageById(int $id): array
    {
        $response = $this->client
            ->withBaseUrl($this->baseUrl)
            ->get("/pages/{$id}");

        return $response->json();
    }
}
