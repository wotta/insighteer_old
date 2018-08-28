<?php

namespace App\Models\Payments;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'name',
        'description',
        'reference',
        'amount',
        'recurring',
        'recurring_day',
        'payment_date',
    ];

    protected $casts = [
        'payment_date',
    ];

    public function balance(): BelongsTo
    {
        return $this->belongsTo(Balance::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
