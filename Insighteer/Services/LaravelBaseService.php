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

    public function all(): Collection
    {
        return $this->repository->all();
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
    }
}