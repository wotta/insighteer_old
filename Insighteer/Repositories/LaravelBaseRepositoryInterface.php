<?php

namespace Insighteer\Repositories;

interface LaravelBaseRepositoryInterface
{
    public function all(): array;

    /**
     * @param array $attributes
     * @return object
     * @throws Illuminate\Database\QueryException
     */
    public function create(array $attributes): object;

    public function update(int $entityId, array $data): bool;

    public function delete(int $entityId): ?bool;
}