<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    protected $fillable = [
        'address',
        'second_address',
        'city',
        'state',
        'postal_code',
        'country_code',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
