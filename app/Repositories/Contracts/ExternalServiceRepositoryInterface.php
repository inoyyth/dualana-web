<?php

namespace App\Repositories\Contracts;

interface ExternalServiceRepositoryInterface
{
    /**
     * Retrieve list of external services.
     *
     * @param array<string, mixed> $query
     * @return array
     */
    public function getServices(array $query = []): array;

    /**
     * Retrieve details of a specific external service by ID.
     *
     * @param int $id
     * @return array
     */
    public function getServiceById(int $id): array;
}
