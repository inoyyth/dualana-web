<?php

namespace App\Application\UseCases;

use App\Domain\Services\ArchitectureOverviewService;

class GetArchitectureOverview
{
    public function __construct(private readonly ArchitectureOverviewService $service)
    {
    }

    public function execute(): array
    {
        return $this->service->getLayers();
    }
}
