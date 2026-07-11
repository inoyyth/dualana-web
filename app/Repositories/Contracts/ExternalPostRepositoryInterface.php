<?php

namespace App\Repositories\Contracts;

interface ExternalPostRepositoryInterface
{
    /**
     * Retrieve list of external posts.
     *
     * @param array<string, mixed> $query
     * @return array
     */
    public function getPosts(array $query = []): array;

    /**
     * Retrieve details of a specific external post by ID.
     *
     * @param int $id
     * @return array
     */
    public function getPostById(int $id): array;
}
