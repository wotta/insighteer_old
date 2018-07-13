<?php

namespace App\Observers;

use App\Models\Bank\AccountType;

class AccountTypeObserver
{
    public function creating(AccountType $accountType): void
    {
        $isCommercial = $accountType->getAttribute('is_commercial');

        $accountType->setAttribute('is_commercial', $isCommercial ?: false);
    }
}
