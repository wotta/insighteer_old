<?php

namespace App\Models\Bank;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_commercial',
    ];

    protected $casts = [
        'is_commercial' => 'boolean',
    ];
}
