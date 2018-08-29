<?php

namespace App\Jobs\ExternalSyncs;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

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
        $path = resource_path('assets/js/externalSyncs/kasboekSync.js');

        $jsonString = shell_exec("node $path");

        $jsonData = json_decode($jsonString);

        foreach ($jsonData as $data) {
            $company = Company::firstOrCreate(['name' => $data->company]);
        }
    }
}
