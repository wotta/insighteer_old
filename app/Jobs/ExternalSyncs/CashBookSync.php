<?php

namespace App\Jobs\ExternalSyncs;

use App\Models\Bank\Account;
use App\Models\Company;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Money\Currencies\ISOCurrencies;
use Money\Currency;

class CashBookSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        $account = Account::with('payments')->whereId(1)->firstOrFail();

        $path = resource_path('assets/js/externalSyncs/kasboekSync.js');

        $jsonString = shell_exec("node $path");

        $jsonData = json_decode($jsonString);

        foreach ($jsonData as $data) {
            $paymentDate = Carbon::createFromFormat('d-m-Y', $data->paymentDate);

            $companyName = $data->company ?: config('insighteer.companies.default');

            $paymentData = [
                'name'         => trim(sprintf('%s - %s', $companyName, $data->description)),
                'description'  => trim($data->description),
                'amount'       => $data->amount *= $this->minorUnit(),
                'payment_date' => $paymentDate->format('Y-m-d'),
            ];

            $company = Company::firstOrCreate(['name' => $companyName]);

            $payment = $account->payments()->updateOrCreate($paymentData);

            $payment->company()->associate($company);
            $payment->status()->associate(Status::where('name', 'open')->firstOrFail());

            $payment->save();
        }
    }

    public function minorUnit($currency = 'EUR')
    {
        $subunit = (new ISOCurrencies())->subunitFor(new Currency($currency));

        return 10 ** $subunit;
    }
}
