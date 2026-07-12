<?php

namespace App\Application\UseCases;

use App\Domain\Entities\ExternalPage;
use App\Domain\Contracts\ExternalPageInterface;
use App\Repositories\Contracts\ExternalClientRepositoryInterface;

class GetExternalClient
{
    public function __construct(
        private readonly ExternalClientRepositoryInterface $repository
    ) {}

    /**
     * Execute use case to get clients.
     *
     * @param array $query
     * @return array<ExternalPageInterface>
     * @throws \Exception
     */
    public function execute(array $query = []): array
    {
        $data = $this->repository->getClient($query);
        $res = [];
        foreach ($data as $item) {
            $res[] = new ExternalPage($item);
        }
        return ['data' => $res];
    }

    /**
     * Execute use case to get client by ID.
     *
     * @param int $id
     * @return ExternalPageInterface
     * @throws \Exception
     */
    public function executeById(int $id): ExternalPageInterface
    {
        $data = $this->repository->getClientById($id);
        return new ExternalPage($data);
    }
}
