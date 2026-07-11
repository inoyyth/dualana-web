<?php

namespace App\Repositories\Contracts;

interface ArchitectureOverviewRepositoryInterface
{
    /**
     * Retrieve architecture layers configuration.
     *
     * @return array
     */
    public function getLayers(): array;
}
