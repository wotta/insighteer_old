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

    public function all(): Collection
    {
        return $this->repository->all();
    }
}