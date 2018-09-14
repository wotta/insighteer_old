<?php

namespace App\Models\Payments;

use App\Models\Bank\Account;
use App\Models\Company;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Payment extends Model
{
    use Searchable;
    use SoftDeletes;

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
        'payment_date' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
