<?php

namespace App\Repositories;

use App\Infrastructure\Http\RestClientInterface;
use App\Repositories\Contracts\ExternalClientRepositoryInterface;

class HttpExternalClientRepository implements ExternalClientRepositoryInterface
{
    protected string $baseUrl;

    public function __construct(
        private readonly RestClientInterface $client
    ) {
        $this->baseUrl = config('app.base_api_url');
    }

    public function getClient(array $query = []): array
    {
        $response = $this->client
            ->withBaseUrl($this->baseUrl)
            ->get('/client', $query);

        return $response->json();
    }

    public function getClientById(int $id): array
    {
        $response = $this->client
            ->withBaseUrl($this->baseUrl)
            ->get("/client/{$id}");

        return $response->json();
    }
}
