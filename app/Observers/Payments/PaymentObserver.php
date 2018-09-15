<?php

namespace App\Observers\Payments;

use App\Models\Payments\Payment;

class PaymentObserver
{
    public function created(Payment $payment): void
    {
        $account = $payment->account()->firstOrFail();

        $account->previous_amount = $account->amount;

        if ($payment->amount < 0) {
            $account->amount -= abs($payment->amount);
        } elseif ($payment->amount > 0) {
            $account->amount += abs($payment->amount);
        }

        $account->save();
    }
}
