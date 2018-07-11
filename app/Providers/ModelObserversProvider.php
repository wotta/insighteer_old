<?php

namespace App\Providers;

use App\Models\Bank\AccountType;
use App\Observers\AccountTypeObserver;
use Illuminate\Support\ServiceProvider;

class ModelObserversProvider extends ServiceProvider
{
    public function boot(): void
    {
        AccountType::observe(AccountTypeObserver::class);
    }

    public function register(): void
    {
        //
    }
}
