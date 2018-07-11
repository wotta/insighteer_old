<?php

namespace App\Observers;

use App\Models\Bank\AccountType;

class AccountTypeObserver
{
    public function creating(AccountType $accountType): void
    {
        $isCommercial = $accountType->getAttribute('is_commercial');

        if (! is_null($isCommercial)) {
            $accountType->setAttribute('is_commercial', filter_var($isCommercial, FILTER_VALIDATE_BOOLEAN));
        }
    }
}
