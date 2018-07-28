<?php

namespace Insighteer\Services;

interface LaravelBaseServiceInterface
{
    public function all(): array;

    public function create(array $data): object;

    public function update(int $entityId, array $data): bool;
}
