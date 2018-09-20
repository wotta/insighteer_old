<?php

namespace App\Console\Commands;

use App\Models\Payments\Payment;
use App\Models\Status;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class UpdatePaymentStatuses extends Command
{
    /** @var Collection */
    private $payments;

    protected $signature = 'payments:status:update';

    protected $description = 'Update the payment statuses.';

    public function __construct(Payment $payments)
    {
        parent::__construct();

        $this->payments = $payments::whereDate('payment_date', '<=', now())->get();
    }

    public function handle()
    {
        $progressBar = $this->output->createProgressBar($this->payments->count());

        $this->payments->each(function (Payment $payment) use ($progressBar) {
            $payment->status()->associate(Status::where('name', 'paid')->firstOrFail())->save();

            $progressBar->advance();
        });

        $progressBar->finish();
    }
}
