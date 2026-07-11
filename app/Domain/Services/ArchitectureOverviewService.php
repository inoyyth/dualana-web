<?php

namespace App\Domain\Services;

use App\Repositories\Contracts\ArchitectureOverviewRepositoryInterface;

class ArchitectureOverviewService
{
    public function __construct(private readonly ArchitectureOverviewRepositoryInterface $repository)
    {
    }

    public function getLayers(): array
    {
        return $this->repository->getLayers();
    }
}
