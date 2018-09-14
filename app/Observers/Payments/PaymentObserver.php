<?php

namespace App\Observers\Payments;

use App\Models\Payments\Payment;

class PaymentObserver
{
    public function created(Payment $payment): void
    {
        $account = $payment->account()->first();
    }
}
