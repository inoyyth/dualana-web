<?php

namespace App\Repositories\Contracts;

interface ExternalPageRepositoryInterface
{
    /**
     * Retrieve list of external pages.
     *
     * @param array<string, mixed> $query
     * @return array
     */
    public function getPage(array $query = []): array;

    /**
     * Retrieve details of a specific external page by ID.
     *
     * @param int $id
     * @return array
     */
    public function getPageById(int $id): array;
}
