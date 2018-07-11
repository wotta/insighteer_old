<?php

namespace Insighteer\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class LaravelBaseRepository implements LaravelBaseRepositoryInterface
{
    /** @var Model */
    protected $model;

    public function all(): Collection
    {
        return $this->getModel()->all();
    }

    public function create(array $items): Model
    {
        return $this->getModel()->create($items);
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    abstract public function setModel(Model $model);
}