<?php

namespace App\Repositories\Contracts;

interface ExternalClientRepositoryInterface
{
    /**
     * Retrieve list of external clients.
     *
     * @param array<string, mixed> $query
     * @return array
     */
    public function getClient(array $query = []): array;

    /**
     * Retrieve details of a specific external client by ID.
     *
     * @param int $id
     * @return array
     */
    public function getClientById(int $id): array;
}
