<?php

namespace Insighteer\Services\Bank;

use Illuminate\Support\Collection;
use Insighteer\Repositories\Bank\AccountTypeRepository;
use Insighteer\Services\LaravelBaseService;

class AccountTypeService extends LaravelBaseService
{
    public function __construct(AccountTypeRepository $accountTypeRepository)
    {
        $this->repository = $accountTypeRepository;
    }

    public function update(int $entityId, array $data): bool
    {
        $data['is_commercial'] = array_key_exists('is_commercial', $data);

        return parent::update($entityId, $data);
    }
}