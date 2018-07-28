<?php

namespace Insighteer\Repositories\Bank;

use App\Models\Bank\AccountType;
use Insighteer\Repositories\LaravelBaseRepository;
use Insighteer\Transformers\AccountTypeTransformer;

class AccountTypeRepository extends LaravelBaseRepository implements AccountTypeRepositoryInterface
{
    public function __construct(AccountType $accountType, AccountTypeTransformer $accountTypeTransformer)
    {
        $this->setModel($accountType);
        $this->setTransformer($accountTypeTransformer);
    }
}
