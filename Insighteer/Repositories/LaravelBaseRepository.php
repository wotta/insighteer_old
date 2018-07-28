<?php

namespace Insighteer\Repositories;

use Illuminate\Database\Eloquent\Model;
use Insighteer\Transformers\TransformerInterface;

abstract class LaravelBaseRepository implements LaravelBaseRepositoryInterface
{
    /** @var TransformerInterface */
    protected $transformer;

    /** @var Model */
    protected $model;

    public function all(): array
    {
        return $this->transformer->transformMulti($this->getModel()->get()->all());
    }

    public function create(array $attributes): object
    {
        return $this->transformer->transform($this->getModel()->create($attributes));
    }

    public function update(int $entityId, array $data): bool
    {
        return $this->getModel()->find($entityId)->update($data);
    }

    public function delete(int $entityId): ?bool
    {
        return $this->getModel()->find($entityId)->delete();
    }

    protected function getModel(): Model
    {
        return $this->model;
    }

    protected function setTransformer(TransformerInterface $transformer): void
    {
        $this->transformer = $transformer;
    }

    protected function setModel(Model $model): Model
    {
        $this->model = $model;

        return $model;
    }
}
