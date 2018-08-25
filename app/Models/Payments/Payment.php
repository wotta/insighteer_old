<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'name',
        'description',
        'reference',
        'amount',
    ];

    public function balance(): BelongsTo
    {
        return $this->belongsTo(Balance::class);
    }
}
