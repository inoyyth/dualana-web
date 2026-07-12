<?php

namespace App\Application\UseCases;

use App\Domain\Entities\ExternalPage;
use App\Repositories\Contracts\ExternalPageRepositoryInterface;

class GetExternalPages
{
    public function __construct(
        private readonly ExternalPageRepositoryInterface $repository
    ) {}

    /**
     * Execute use case to get pages.
     *
     * @param array $query
     * @return array
     * @throws \Exception
     */
    public function execute(array $query = []): array
    {
        $data = $this->repository->getPage($query);
        $res = [];
        foreach ($data as $item) {
            $res[] = new ExternalPage($item);
        }
        return ['data' => $res];
    }

    /**
     * Get detail page by ID.
     *
     * @param int $id
     * @return ExternalPageInterface
     */
    public function executeById(int $id): ExternalPageInterface
    {
        $data = $this->repository->getPageById($id);
        return new ExternalPage($data);
    }
}
