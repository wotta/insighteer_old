<?php

namespace App\Console\Commands;

use App\Models\Payments\Payment;
use App\Models\Status;
use Illuminate\Console\Command;

class UpdatePaymentStatuses extends Command
{
    protected $signature = 'payments:status:update';

    protected $description = 'Update the payment statuses.';

    public function __construct(Payment $payments)
    {
        parent::__construct();;
    }

    public function handle()
    {
        $payments = Payment::whereDate('payment_date', '<=', now())->whereHas('status', function ($query) {
            return $query->where('name', 'open');
        })->get();

        if ($payments->count() > 0) {        
            $progressBar = $this->output->createProgressBar($payments->count());

            $payments->each(function (Payment $payment) use ($progressBar) {
                $payment->status()->associate(Status::where('name', 'paid')->firstOrFail())->save();

                $progressBar->advance();
            });

            $progressBar->finish();
        }
    }
}
