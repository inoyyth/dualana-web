<?php

namespace App\Application\UseCases;

use App\Repositories\Contracts\ExternalPostRepositoryInterface;

class GetExternalPostById
{
    public function __construct(
        private readonly ExternalPostRepositoryInterface $repository
    ) {
    }

    /**
     * Get detail post by ID.
     *
     * @param int $id
     * @return array
     */
    public function execute(int $id): array
    {
        return $this->repository->getPostById($id);
    }
}
