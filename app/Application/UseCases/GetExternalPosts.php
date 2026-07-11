<?php

namespace App\Application\UseCases;

use App\Repositories\Contracts\ExternalPostRepositoryInterface;

class GetExternalPosts
{
    public function __construct(
        private readonly ExternalPostRepositoryInterface $repository
    ) {
    }

    /**
     * Execute use case to get posts.
     *
     * @param array $query
     * @return array
     * @throws \Exception
     */
    public function execute(array $query = []): array
    {
        return $this->repository->getPosts($query);
    }
}
