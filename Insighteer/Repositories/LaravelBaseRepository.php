<?php

namespace Insighteer\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LaravelBaseRepository implements LaravelBaseRepositoryInterface
{
    /** @var Model */
    protected $model;

    public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}