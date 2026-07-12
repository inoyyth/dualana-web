<?php

namespace App\Repositories;

use App\Infrastructure\Http\RestClientInterface;
use App\Repositories\Contracts\ExternalServiceRepositoryInterface;

class HttpExternalServiceRepository implements ExternalServiceRepositoryInterface
{
    protected string $baseUrl;

    public function __construct(
        private readonly RestClientInterface $client
    ) {
        $this->baseUrl = config('app.base_api_url');
    }

    public function getServices(array $query = []): array
    {
        $response = $this->client
            ->withBaseUrl($this->baseUrl)
            ->get('/services', $query);
        // dd($response->json());
        return $response->json();
    }

    public function getServiceById(int $id): array
    {
        $response = $this->client
            ->withBaseUrl($this->baseUrl)
            ->get("/services/{$id}");

        return $response->json();
    }
}
