<?php

namespace App\Application\UseCases;

use App\Domain\Entities\ExternalPage;
use App\Repositories\Contracts\ExternalServiceRepositoryInterface;

class GetExternalServices
{
    public function __construct(
        private readonly ExternalServiceRepositoryInterface $repository
    ) {}

    /**
     * Execute use case to get services.
     *
     * @param array $query
     * @return array
     * @throws \Exception
     */
    public function execute(array $query = []): array
    {
        $data = $this->repository->getServices($query);
        $res = [];
        foreach ($data as $item) {
            $res[] = new ExternalPage($item);
        }
        return ['data' => $res];
    }

    /**
     * Get detail service by ID.
     *
     * @param int $id
     * @return ExternalPageInterface
     */
    public function executeById(int $id): ExternalPageInterface
    {
        $data = $this->repository->getServiceById($id);
        return new ExternalPage($data);
    }
}
