<?php

namespace Insighteer\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Insighteer\Repositories\LaravelBaseRepositoryInterface;

class LaravelBaseService implements LaravelBaseServiceInterface
{
    /** @var LaravelBaseRepositoryInterface */
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function all(): array
    {
        return $this->repository->all()->toArray();
    }

    public function create(array $data): object
    {
        return $this->repository->create($data);
    }

    public function update(int $entityId, array $data): bool
    {
        return $this->repository->update($entityId, $data);
    }
}