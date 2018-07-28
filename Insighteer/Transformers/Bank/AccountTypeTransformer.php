<?php

namespace Insighteer\Transformers;

use Illuminate\Database\Eloquent\Model;
use Insighteer\Entities\Bank\AccountType as AccountTypeEntity;

class AccountTypeTransformer implements TransformerInterface
{
    public function transform(Model $entity): object
    {
        $accountTypeEntity = new AccountTypeEntity(
            $entity->name,
            $entity->description,
            $entity->is_commercial
        );

        $accountTypeEntity->setId($entity->id);

        return $accountTypeEntity;
    }

    public function transformMulti(array $accountTypes): array
    {
        return array_map([$this, 'transform'], $accountTypes);
    }
}
