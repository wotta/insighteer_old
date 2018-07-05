<?php

namespace Insighteer\Repositories;

use Illuminate\Support\Collection;

interface LaravelBaseRepositoryInterface
{
    public function all(): Collection;
}