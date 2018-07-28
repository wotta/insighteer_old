<?php

namespace App\Models\Bank;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'account_type_id',
        'iban',
        'bic',
        'bank_name',
    ];
}
