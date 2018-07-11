<?php

namespace Insighteer\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface LaravelBaseRepositoryInterface
{
    public function all(): Collection;

    /**
     * @param array $items
     * @return Model
     * @throws Illuminate\Database\QueryException
     */
    public function create(array $items): Model;
}