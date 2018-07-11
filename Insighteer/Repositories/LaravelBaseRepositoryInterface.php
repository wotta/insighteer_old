<?php

namespace Insighteer\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface LaravelBaseRepositoryInterface
{
    public function all(): Collection;

    public function create(array $items): Model;
}