<?php

namespace App\Providers;

use App\Models\Payments\Payment;
use App\Observers\Payments\PaymentObserver;
use Illuminate\Support\ServiceProvider;

class ModelObserverProvider extends ServiceProvider
{
    public function boot(): void
    {
        Payment::observe(PaymentObserver::class);
    }
}
