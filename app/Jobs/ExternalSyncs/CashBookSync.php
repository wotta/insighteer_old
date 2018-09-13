<?php

namespace App\Jobs\ExternalSyncs;

use App\Models\Company;
use App\Models\Payments\Balance;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CashBookSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $balance = Balance::with('payments')->whereId(1)->firstOrFail();

        $path = resource_path('assets/js/externalSyncs/kasboekSync.js');

        $jsonString = shell_exec("node $path");

        $jsonData = json_decode($jsonString);

        foreach ($jsonData as $data) {
            $paymentData = Carbon::createFromFormat('d-m-Y', $data->paymentDate);

            $company = Company::firstOrCreate(['name' => $data->company]);

            $payment = $balance->payments
                ->where('description', $data->description)
                ->where('amount', $data->amount)
                ->where('payment_date', $paymentData)
                ->first();

            if (!$payment) {
                $payment = $balance->payments()->create([
                    'status_id'    => 1,
                    'company_id'   => $company->id,
                    'name'         => sprintf('%s - %s', $data->company, $data->description),
                    'description'  => $data->description,
                    'amount'       => $data->amount,
                    'payment_date' => $paymentData,
                ]);
            }

            $payment->company()->associate($company);
            $payment->status()->associate(Status::where('name', 'open')->firstOrFail());
            $payment->save();
        }
    }
}
