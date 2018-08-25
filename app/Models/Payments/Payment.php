<?php

namespace App\Models\Payments;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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

    public function status(): MorphOne
    {
        $this->HasOne(Status::class);
    }
}
