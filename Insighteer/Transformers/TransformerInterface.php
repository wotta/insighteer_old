<?php

namespace Insighteer\Transformers;

use Illuminate\Database\Eloquent\Model;

interface TransformerInterface
{
    public function transform(Model $entity): object;

    public function transformMulti(array $accountTypes): array;
}
