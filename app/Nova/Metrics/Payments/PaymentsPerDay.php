<?php

namespace App\Nova\Metrics\Payments;

use App\Models\Payments\Payment;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;

class PaymentsPerDay extends Trend
{
    public function __construct(string $calculationType = 'count', ?string $component = null)
    {
        parent::__construct($component);
    }

    public function name()
    {
        return __('account.payments');
    }

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByDays($request, Payment::class)
            ->showLatestValue();
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            7 => '7 Days',
            15 => '15 Days',
            30 => '30 Days',
            60 => '60 Days',
            90 => '90 Days',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
//         return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return '-payments-per-day';
    }
}
