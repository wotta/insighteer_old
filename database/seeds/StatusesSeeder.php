<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    public function run(): void
    {
        Status::insert([
            [
                'name' => 'open',
                'description' => __('status.open.description'),
            ],
            [
                'name' => 'paid',
                'description' => __('status.paid.description'),
            ],
            [
                'name' => 'partially_paid',
                'description' => __('status.partially_paid.description'),
            ],
            [
                'name' => 'refunded',
                'description' => __('status.refunded.description'),
            ],
        ]);
    }
}
