<?php

namespace Insighteer\Services\Bank;

use Insighteer\Repositories\Bank\AccountTypeRepository;
use Insighteer\Services\LaravelBaseService;

class AccountTypeService extends LaravelBaseService
{
    public function __construct(AccountTypeRepository $accountTypeRepository)
    {
        parent::__construct($accountTypeRepository);
    }
}