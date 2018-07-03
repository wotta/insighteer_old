<?php

namespace Insighteer\Services;

use Illuminate\Database\Eloquent\Model;

interface LaravelBaseServiceInterface
{
    public function all();

    public function create(array $data): Model;
}