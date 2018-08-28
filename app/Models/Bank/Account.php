<?php

namespace App\Models\Bank;

use App\Models\Payments\Balance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Account extends Model
{
    use Searchable;

    protected $fillable = [
        'account_type_id',
        'iban',
        'bic',
        'bank_name',
    ];

    public function accountType(): BelongsTo
    {
        return $this->belongsTo(AccountType::class);
    }

    public function balance(): HasMany
    {
        return $this->hasMany(Balance::class);
    }
}
