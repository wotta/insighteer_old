<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Insighteer\Repositories\Bank\AccountTypeRepository;
use Insighteer\Repositories\Bank\AccountTypeRepositoryInterface;

class InsighteerServiceProvider extends ServiceProvider
{
    public function boot(): void {}

    public function register(): void
    {
        $this->app->bind(AccountTypeRepositoryInterface::class, AccountTypeRepository::class);
    }
}
