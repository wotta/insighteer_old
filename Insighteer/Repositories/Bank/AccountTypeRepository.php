<?php

namespace Insighteer\Repositories\Bank;

use App\Models\Bank\AccountType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Insighteer\Repositories\LaravelBaseRepository;

class AccountTypeRepository extends LaravelBaseRepository implements AccountTypeRepositoryInterface
{
    public function __construct(AccountType $accountType)
    {
        $this->setModel($accountType);
    }

    public function setModel(Model $model): Model
    {
        $this->model = $model;
        return $model;
    }
}