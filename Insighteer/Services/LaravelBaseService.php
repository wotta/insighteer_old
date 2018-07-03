<?php

namespace Insighteer\Services;

use Illuminate\Database\Eloquent\Model;

class LaravelBaseService implements LaravelBaseServiceInterface
{
    /** @var LaravelBaseRepositoryInterface */
    private $repository;

    public function __construct(LaravelBaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
    }
}