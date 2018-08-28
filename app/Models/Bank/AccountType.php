<?php

namespace App\Models\Bank;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class AccountType extends Model
{
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'is_commercial',
    ];

    protected $casts = [
        'is_commercial' => 'boolean',
    ];
}
