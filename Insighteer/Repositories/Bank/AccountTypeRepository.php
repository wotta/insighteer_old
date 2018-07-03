<?php

namespace Insighteer\Repositories\Bank;

use App\Models\Bank\AccountType;
use Insighteer\Repositories\LaravelBaseRepository;

class AccountTypeRepository extends LaravelBaseRepository
{
    public function __construct(AccountType $accountType)
    {
        parent::setModel($accountType);
    }
}